import xml.etree.ElementTree as ET
import pandas as pd
import re
import sys
from pathlib import Path

G_NS = "http://base.google.com/ns/1.0"

# Direct fields to extract from each <item> (tag -> column name)
DIRECT_FIELDS = {
    f"{{{G_NS}}}id": "id",
    f"{{{G_NS}}}gtin": "gtin",
    f"{{{G_NS}}}item_group_id": "item_group_id",
    "title": "title",
    f"{{{G_NS}}}price": "price",
    "description": "description",
    f"{{{G_NS}}}product_type": "product_type",
    f"{{{G_NS}}}image_link": "image_link",
    f"{{{G_NS}}}availability": "availability",
    f"{{{G_NS}}}availability_date": "availability_date",
    f"{{{G_NS}}}quantity": "quantity",
    f"{{{G_NS}}}shipping_weight": "shipping_weight",
    f"{{{G_NS}}}size": "size",
    f"{{{G_NS}}}color": "color",
    f"{{{G_NS}}}brand": "brand",
    f"{{{G_NS}}}condition": "condition",
    f"{{{G_NS}}}link": "link",
    "link": "link",
}


def strip_html(text: str) -> str:
    """Remove HTML tags from a string."""
    if not text:
        return ""
    return re.sub(r"<[^>]+>", "", text).strip()


def parse_item(item: ET.Element) -> dict:
    row = {}

    # Extract direct fields
    for tag, col in DIRECT_FIELDS.items():
        el = item.find(tag)
        if el is not None and el.text:
            text = el.text.strip()
            if col == "description":
                text = strip_html(text)
            row[col] = text

    # Pivot g:product_detail into individual columns
    for detail in item.findall(f"{{{G_NS}}}product_detail"):
        name_el = detail.find(f"{{{G_NS}}}attribute_name")
        value_el = detail.find(f"{{{G_NS}}}attribute_value")
        if name_el is not None and value_el is not None:
            attr_name = (name_el.text or "").strip()
            attr_value = (value_el.text or "").strip()
            if attr_name:
                row[attr_name] = attr_value

    return row


def main(xml_path: str, output_path: str):
    tree = ET.parse(xml_path)
    root = tree.getroot()

    channel = root.find("channel")
    if channel is None:
        print("No <channel> element found in XML.")
        sys.exit(1)

    items = channel.findall("item")
    print(f"Found {len(items)} items.")

    rows = [parse_item(item) for item in items]
    df = pd.DataFrame(rows)

    # Move the main identifier columns to the front
    priority_cols = ["id", "gtin", "item_group_id", "title", "price", "availability",
                     "availability_date", "quantity", "product_type", "image_link",
                     "shipping_weight", "size", "color", "brand", "condition", "link", "description"]
    front = [c for c in priority_cols if c in df.columns]
    rest = [c for c in df.columns if c not in front]
    df = df[front + rest]

    df.to_excel(output_path, index=False, engine="openpyxl")
    print(f"Saved {len(df)} rows x {len(df.columns)} columns -> {output_path}")


if __name__ == "__main__":
    base = Path(__file__).parent
    xml_file = str(base / "kellys.xml")
    out_file = str(base / "kellys.xlsx")

    if len(sys.argv) == 3:
        xml_file, out_file = sys.argv[1], sys.argv[2]
    elif len(sys.argv) == 2:
        xml_file = sys.argv[1]

    main(xml_file, out_file)
