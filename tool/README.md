
# RASpray - Password Spraying Tool

**Version**: 1.0.0

## Overview

RASpray is a password spraying tool designed to perform basic authentication attempts against a target IP using a provided list of usernames and passwords. The tool is built with Python and can be deployed on Unix-based systems. Still under construction.

Password spraying involves trying a list of common passwords against multiple user accounts to detect weak login credentials, while avoiding account lockouts that occur from multiple failed attempts on a single account.

## Features

- Traverses through website pages and attempts to detect password fields and Basic Authentication prompts.
- Supports filtering of usernames and passwords based on user-defined criteria:
  - Minimum and maximum length
  - Requirement for uppercase letters, lowercase letters, numbers, or special characters
- Avoids infinite loops during website traversal by keeping track of visited pages.
- Provides a help command to guide users on how to use the tool.
- Displays the tool version.

## Requirements

- Python 3.x
- `requests` library for handling HTTP requests.
- `beautifulsoup4` for HTML parsing.

Install the necessary libraries if you don’t have them already:
```bash
pip install requests beautifulsoup4
```

## Installation

1. **Download the Script**:
   Clone or download the script and make it executable:
   ```bash
   chmod +x raspray.py
   ```

2. **Move to Path (Optional)**:
   If you want to run it from any location, move the script to a directory in your PATH:
   ```bash
   sudo mv raspray.py /usr/local/bin/raspray
   ```

## Usage

RASpray can be run from the command line, passing in the required arguments for the usernames file, passwords file, target IP address, and optional username/password filtering criteria.

### Basic Usage:
```bash
raspray -u <usernames_file> -p <passwords_file> -i <ip_address>
```

### Example:
```bash
raspray -u usernames.txt -p passwords.txt -i 192.168.1.1
```

### Options:

- `-u, --users`: Path to the file containing a list of usernames.
- `-p, --pass`: Path to the file containing a list of passwords.
- `-i, --ip`: The target IP address for the password spray.
- `--min-len`: Specify the minimum length for usernames or passwords.
- `--max-len`: Specify the maximum length for usernames or passwords.
- `--uppercase`: Require at least one uppercase letter in usernames or passwords.
- `--lowercase`: Require at least one lowercase letter in usernames or passwords.
- `--numbers`: Require at least one number in usernames or passwords.
- `--special-chars`: Require at least one special character (e.g., `!`, `@`, `#`).
- `-h, --help`: Displays a help message with usage instructions.
- `--version`: Displays the current version of the tool.

### Help Command:
To display a list of available options, use:
```bash
raspray --help
```

### Version:
To check the current version of the tool:
```bash
raspray --version
```

## Files

- **`raspray.py`**: The main Python script for the password spraying tool.
- **`usernames.txt`**: A sample file containing usernames (each on a new line).
- **`passwords.txt`**: A sample file containing passwords (each on a new line).

## Next Steps

- Implement delays between attempts to avoid detection and lockout.
- Extend support for other authentication methods (e.g., RDP, SSH).
- Explore integration with machine learning to detect patterns in failed attempts.
- Implement features Amadou and Roo have discussed, such as more complex traversal algorithms and additional protocols.

## License

This tool is provided for educational purposes and ethical hacking only. Ensure you have permission from the network or system owners before testing. Unauthorized use is illegal and punishable by law. This tool is currently under development for a senior thesis under Professor Jeff Ondich at Carleton College.

---

### Contributors

- **Amadou Touré** '25, Carleton College. [tourea@carleton.edu](mailto:tourea@carleton.edu)
- **Roo Case** '25, Carleton College. [croo@carleton.edu](mailto:croo@carleton.edu)

---
