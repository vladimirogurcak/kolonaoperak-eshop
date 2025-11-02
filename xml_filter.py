#!/usr/bin/env python3
"""
XML Filter Script
Filters XML files based on XPath expressions, keeping only elements that match.
"""

import sys
from lxml import etree

def filter_xml_by_xpath(input_file, output_file, xpath_expression):
    """
    Filter XML file based on XPath expression.
    
    Args:
        input_file (str): Path to input XML file
        output_file (str): Path to output XML file
        xpath_expression (str): XPath expression to filter by
    """
    try:
        # Parse the XML file
        print(f"Parsing {input_file}...")
        tree = etree.parse(input_file)
        root = tree.getroot()
        
        # Find all elements matching the XPath
        print(f"Applying XPath: {xpath_expression}")
        matching_elements = tree.xpath(xpath_expression)
        
        if not matching_elements:
            print("No elements found matching the XPath expression.")
            return
        
        print(f"Found {len(matching_elements)} matching elements.")
        
        # Create a new XML tree with only matching elements
        new_root = etree.Element(root.tag, root.attrib)
        
        # Add matching elements to the new tree
        for element in matching_elements:
            # Create a deep copy of the element to avoid tree conflicts
            new_element = etree.fromstring(etree.tostring(element, encoding='unicode'))
            new_root.append(new_element)
        
        # Create new tree and save
        new_tree = etree.ElementTree(new_root)
        new_tree.write(output_file, pretty_print=True, encoding="UTF-8", xml_declaration=True)
        
        print(f"Filtered XML saved to {output_file}")
        
    except FileNotFoundError:
        print(f"Error: File '{input_file}' not found.")
        sys.exit(1)
    except etree.XPathEvalError as e:
        print(f"Error: Invalid XPath expression: {e}")
        sys.exit(1)
    except Exception as e:
        print(f"Error: {e}")
        sys.exit(1)

def main():
    if len(sys.argv) != 4:
        print("Usage: python3 xml_filter.py <input_file> <output_file> <xpath_expression>")
        print("\nExample:")
        print('  python3 xml_filter.py input.xml output.xml "//Item[Category1[1][not(contains(.,\"Kids\"))] and MOCCZK[1] > 30000]"')
        print('  python3 xml_filter.py data.xml filtered.xml "//Product[@category=\"bikes\"]"')
        sys.exit(1)
    
    input_file = sys.argv[1]
    output_file = sys.argv[2]
    xpath_expression = sys.argv[3]
    
    filter_xml_by_xpath(input_file, output_file, xpath_expression)

if __name__ == "__main__":
    main()
