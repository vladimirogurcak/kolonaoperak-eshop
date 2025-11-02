#!/usr/bin/env python3
"""
XML to Excel Converter
Converts XML files containing Item elements to Excel format.
"""

import sys
import pandas as pd
from lxml import etree
from collections import defaultdict

def xml_to_excel(input_file, output_file):
    """
    Convert XML file to Excel format.
    
    Args:
        input_file (str): Path to input XML file
        output_file (str): Path to output Excel file
    """
    try:
        print(f"Parsing {input_file}...")
        
        # Parse the XML file
        tree = etree.parse(input_file)
        root = tree.getroot()
        
        # Find all Item elements
        items = root.xpath("//SHOPITEM")
        
        if not items:
            print("No Item elements found in the XML file.")
            return
        
        print(f"Found {len(items)} items. Converting to Excel...")
        
        # Extract data from each item
        data = []
        all_columns = set()
        
        for item in items:
            item_data = {}
            
            # Extract all child elements
            for child in item:
                tag = child.tag
                
                # Handle PARAM elements specially
                if tag == "PARAM":
                    # Extract PARAM_NAME and VAL from PARAM element
                    param_name = None
                    param_val = None
                    
                    for param_child in child:
                        if param_child.tag == "PARAM_NAME":
                            param_name = param_child.text.strip() if param_child.text else ""
                        elif param_child.tag == "VAL":
                            param_val = param_child.text.strip() if param_child.text else ""
                    
                    # Add param as a column if we have both name and value
                    if param_name and param_val is not None:
                        item_data[param_name] = param_val
                        all_columns.add(param_name)
                else:
                    # Handle regular elements
                    text = child.text.strip() if child.text else ""
                    item_data[tag] = text
                    all_columns.add(tag)
            
            data.append(item_data)
        
        # Convert to DataFrame
        df = pd.DataFrame(data)
        
        # Reorder columns alphabetically for better organization
        df = df.reindex(sorted(df.columns), axis=1)
        
        # Save to Excel
        print(f"Saving to {output_file}...")
        df.to_excel(output_file, index=False, engine='openpyxl')
        
        print(f"Successfully converted {len(items)} items to Excel format.")
        print(f"Excel file saved as: {output_file}")
        print(f"Columns: {', '.join(sorted(all_columns))}")
        
    except FileNotFoundError:
        print(f"Error: File '{input_file}' not found.")
        sys.exit(1)
    except Exception as e:
        print(f"Error: {e}")
        sys.exit(1)

def main():
    if len(sys.argv) != 3:
        print("Usage: python3 xml_to_excel.py <input_xml_file> <output_excel_file>")
        print("\nExample:")
        print("  python3 xml_to_excel.py ctm-bikes.xml ctm-bikes.xlsx")
        print("  python3 xml_to_excel.py data.xml products.xlsx")
        sys.exit(1)
    
    input_file = sys.argv[1]
    output_file = sys.argv[2]
    
    # Check if output file has .xlsx extension
    if not output_file.endswith('.xlsx'):
        output_file += '.xlsx'
    
    xml_to_excel(input_file, output_file)

if __name__ == "__main__":
    main()

