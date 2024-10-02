
# ARSpray - Password Spraying Tool

**Version**: 1.0.0

## Overview

ARSpray is a simple password spraying tool designed to perform basic authentication attempts against a target IP using a provided list of usernames and passwords. The tool is built with Python and can be deployed on Unix-based systems.

Password spraying involves trying a list of common passwords against multiple user accounts to detect weak login credentials, while avoiding account lockouts that occur from multiple failed attempts on a single account.

## Features

- Attempts every combination of usernames and passwords against a target server with basic HTTP authentication.
- Provides a help command to guide users on how to use the tool.
- Displays the tool version.
  
## Requirements

- Python 3.x
- `requests` library for handling HTTP requests.

Install the `requests` library if you don’t have it already:
```bash
pip install requests
```

## Installation

1. **Download the Script**:
   Clone or download the script and make it executable:
   ```bash
   chmod +x arspray.py
   ```

2. **Move to Path (Optional)**:
   If you want to run it from any location, move the script to a directory in your PATH:
   ```bash
   sudo mv arspray.py /usr/local/bin/arspray
   ```

## Usage

arspray can be run from the command line, passing in the required arguments for the usernames file, passwords file, and target IP address.

### Basic Usage:
```bash
arspray -u <usernames_file> -p <passwords_file> -i <ip_address>
```

### Example:
```bash
arspray -u usernames.txt -p passwords.txt -i 192.168.1.1
```

### Options:

- `-u, --users`: Path to the file containing a list of usernames.
- `-p, --pass`: Path to the file containing a list of passwords.
- `-i, --ip`: The target IP address for the password spray.
- `-h, --help`: Displays a help message with usage instructions.
- `--version`: Displays the current version of the tool.

### Help Command:
To display a list of available options, use:
```bash
arspray --help
```

### Version:
To check the current version of the tool:
```bash
arspray --version
```

## Files

- **`arspray.py`**: The main Python script for the password spraying tool.
- **`usernames.txt`**: A sample file containing usernames (each on a new line).
- **`passwords.txt`**: A sample file containing passwords (each on a new line).

## Next Steps

- Add logging capabilities to track attempts and results.
- Implement delays between attempts to avoid detection and lockout.
- Extend support for other authentication methods (e.g., RDP, SSH).
- Add specifications in usernames / passwords (length, special characters, etc.)
- Other things Amadou and Roo have discussed

## License

This tool is provided for educational purposes and ethical hacking only. Ensure you have permission from the designers before testing on any network or system. Unauthorized use is illegal and punishable by law. This tool is currently under development for a senior thesis under Professor Jeff Ondich at Carleton College. Fall '24: Building Hacking Tools from Scratch

---

### Contributors

- Amadou Touré '25, Carleton College. tourea@carleton.edu
- Roo Case '25, Carleton College. croo@carleton.edu

---
