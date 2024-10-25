# RASpray - Password Spraying Tool

**Version**: 1.0.0

## Overview

RASpray is a password spraying tool designed to perform basic authentication attempts against a target IP using a provided list of usernames and passwords. The tool is built with Python and is compatible with Unix-based systems. **Still under construction.**

Password spraying involves trying a list of common passwords across multiple user accounts to detect weak login credentials while avoiding account lockouts from repeated failed attempts on a single account.

## Features

- **Website Traversal**: Crawls through website pages and attempts to detect password fields and Basic Authentication prompts, with protections against infinite loops.
- **Username & Password Filtering**: Supports customizable filtering of usernames and passwords based on:
  - Minimum and maximum length
  - Uppercase, lowercase, numeric, and special character requirements
- **Password Spraying and Brute Forcing**: If initial password spraying attempts fail, the tool can perform brute-force attacks with custom delays to avoid detection.
- **Help Command**: Displays usage instructions and available options.
- **Version Display**: Outputs the tool version for easy tracking.

## Requirements

- **Python 3.x**
- **Python Libraries**:
  - `requests` for handling HTTP requests.
  - `beautifulsoup4` for HTML parsing.
  - `colorama` for colored console output.

Install the necessary libraries:
```bash
pip install requests beautifulsoup4 colorama
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

RASpray can be run from the command line, passing in the required arguments for usernames and passwords files, target IP address, and optional filtering criteria.

### Basic Usage
```bash
raspray -u <usernames_file> -p <passwords_file> -i <ip_address>
```

### Example
```bash
raspray -u usernames.txt -p passwords.txt -i 192.168.1.1 --username-min-len 4 --password-max-len 8
```

### Options

- **Required Arguments**:
  - `-u, --users`: Path to the file containing a list of usernames.
  - `-p, --pass`: Path to the file containing a list of passwords.
  - `-i, --ip`: Target IP address for the password spray.

- **Filtering Options**:
  - `--username-min-len`: Minimum length for usernames.
  - `--username-max-len`: Maximum length for usernames.
  - `--username-uppercase`: Require at least one uppercase letter in usernames.
  - `--username-lowercase`: Require at least one lowercase letter in usernames.
  - `--username-numbers`: Require at least one number in usernames.
  - `--username-special-chars`: Require at least one special character in usernames.
  - `--password-min-len`: Minimum length for passwords.
  - `--password-max-len`: Maximum length for passwords.
  - `--password-uppercase`: Require at least one uppercase letter in passwords.
  - `--password-lowercase`: Require at least one lowercase letter in passwords.
  - `--password-numbers`: Require at least one number in passwords.
  - `--password-special-chars`: Require at least one special character in passwords.

- **Other Options**:
  - `-h, --help`: Display a help message with usage instructions.
  - `--version`: Display the current version of the tool.

### Help Command
To view available options and usage instructions, use:
```bash
raspray --help
```

### Version
To check the current version of the tool:
```bash
raspray --version
```

## Files

- **`raspray.py`**: The main Python script for the password spraying tool.
- **`usernames.txt`**: A sample file containing usernames (each on a new line).
- **`passwords.txt`**: A sample file containing passwords (each on a new line).

## Functionality Overview

### Website Traversal

The tool starts from the target IP and traverses website links, detecting pages with either form-based password fields or Basic Authentication prompts. This allows RASpray to locate potential entry points across multiple pages.

### Password Spraying

RASpray attempts to log in using combinations from specified usernames and passwords files. It supports custom filtering for these login credentials based on user-defined criteria for length, uppercase, lowercase, numeric, and special character requirements.

### Brute Forcing (Optional)

If password spraying attempts fail, RASpray can perform brute-forcing as an additional option. This mode generates all possible combinations of characters to match potential passwords. A configurable delay between attempts helps to prevent detection.

### Time Delay

A time delay (default: 5 seconds) is set between brute-force attempts to avoid detection by security mechanisms. This delay is customizable in the `perform_bruteforce` function.

### Output

- **Success Messages**: Displayed with successful login credentials.
- **Failure Messages**: Lists pages and credentials for which login attempts failed.

### Example Output
```plaintext
Starting RASpray...

Trying username: admin and password: admin123
Success! Username: admin, Password: admin123 on http://192.168.1.1/login

--- Summary of Cracking Attempts ---
Successfully cracked pages:
Page: http://192.168.1.1/login, Username: admin, Password: admin123
```

## Next Steps

- **Feature Improvements**: Additional protocols (e.g., RDP, SSH).
- **Advanced Traversal**: Implementing complex traversal algorithms.
- **Machine Learning**: Detecting patterns in failed login attempts.
- **Extended Brute Force Controls**: More options to control brute-force attempts for better granularity.

## License

This tool is provided for **educational purposes and ethical hacking only**. Make sure you have permission from the network or system owners before testing. Unauthorized use is illegal and punishable by law. This tool is currently under development for a senior thesis under **Professor Jeff Ondich** at **Carleton College**.

---

### Contributors

- **Amadou Touré** '25, Carleton College. [tourea@carleton.edu](mailto:tourea@carleton.edu)
- **Roo Case** '25, Carleton College. [caser@carleton.edu](mailto:caser@carleton.edu)

---