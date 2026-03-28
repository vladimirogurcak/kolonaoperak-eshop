from lxml import etree
from pathlib import Path

INPUT  = Path(__file__).parent / "kellys.xml"
OUTPUT = Path(__file__).parent / "kellys_filtered.xml"

ns = {"g": "http://base.google.com/ns/1.0"}
XPATH = '//item[g:availability[1] = "in stock" and number(substring-before(g:price, " ")) >= 2000]'

tree = etree.parse(INPUT)
items = tree.xpath(XPATH, namespaces=ns)
print(f"Matched {len(items)} items.")

# Rebuild the RSS/channel wrapper with only matched items
root    = tree.getroot()
channel = root.find("channel")

new_root    = etree.Element(root.tag, root.attrib)
new_root.attrib.update(root.attrib)
# Copy namespaces by re-creating root with same nsmap
new_root    = etree.Element(root.tag, nsmap=root.nsmap)
new_channel = etree.SubElement(new_root, "channel")

# Copy channel metadata (non-item children)
for child in channel:
    if child.tag != "item":
        new_channel.append(etree.fromstring(etree.tostring(child)))

# Append filtered items
for item in items:
    new_channel.append(etree.fromstring(etree.tostring(item)))

out_tree = etree.ElementTree(new_root)
out_tree.write(OUTPUT, encoding="UTF-8", xml_declaration=True, pretty_print=True)
print(f"Saved -> {OUTPUT}")
