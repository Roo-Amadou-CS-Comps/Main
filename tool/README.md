# RASpray - Password Spraying Tool

## Overview

**RASpray** is a password spraying tool designed to test the security of web applications by attempting to log in using a list of usernames and passwords. It supports both Basic Authentication and form-based logins, allowing security professionals and developers to assess their systems effectively.

### Features

- Traverse websites to find authentication fields
- Support for both Basic Auth and form-based logins
- Customizable username and password criteria
- Multi-threaded login attempts for increased efficiency
- Detailed logging and reporting of attempts and results

## Table of Contents

1. [Installation](#installation)
2. [Execution](#execution)
3. [Usage](#usage)
4. [Command-Line Options](#command-line-options)
5. [Examples](#examples)
6. [Requirements](#requirements)
7. [License](#license)
8. [Contributors](#contributors)

## Installation

To install RASpray, you need Python 3 and the required packages. Follow the steps below:

**Install the required packages:**

   You can use `pip` to install the necessary libraries. It's recommended to use a virtual environment.

   ```bash
   python3 -m venv venv
   source venv/bin/activate  # On Windows use `venv\Scripts\activate`
   pip install -r requirements.txt
   ```

   **Note:** The `requirements.txt` file should include the following dependencies:

   ```
   requests
   beautifulsoup4
   psutil
   colorama
   urllib3
   progressbar
   ```

## Execution

To execute RASpray, use the following command structure:

```bash
python3 raspray [options]
```

## Usage

Once you have installed the required dependencies, you can use RASpray to conduct password spraying attacks by specifying the necessary options.

### Command-Line Options

```plaintext
-h, --help                  Show this help message and exit
-u, --users                 Specify the file containing usernames
-p, --pass                  Specify the file containing passwords
-i, --ip                    Specify the target IP address
--version                   Show the tool version and exit

Username Criteria:
--username-min-len          Specify the minimum length of usernames (default: 1)
--username-max-len          Specify the maximum length of usernames (default: 20)
--username-uppercase         Require at least 1 uppercase letter in usernames
--username-lowercase         Require at least 1 lowercase letter in usernames
--username-numbers           Require at least 1 number in usernames
--username-special-chars     Require at least 1 special character in usernames (e.g., !, @, #)

Password Criteria:
--password-min-len          Specify the minimum length of passwords (default: 1)
--password-max-len          Specify the maximum length of passwords (default: 20)
--password-uppercase         Require at least 1 uppercase letter in passwords
--password-lowercase         Require at least 1 lowercase letter in passwords
--password-numbers           Require at least 1 number in passwords
--password-special-chars     Require at least 1 special character in passwords (e.g., !, @, #)
```

### Examples

1. **Basic Usage:**

   ```bash
   python3 raspray.py -u users.txt -p passwords.txt -i 192.168.1.1
   ```

   This command will attempt to log in to the target IP address using the usernames and passwords specified in `users.txt` and `passwords.txt`.

2. **Custom Username and Password Criteria:**

   ```bash
   python3 raspray.py -u users.txt -p passwords.txt -i 192.168.1.1 --username-min-len 3 --username-max-len 15 --password-min-len 8 --password-special-chars
   ```

   This command sets specific criteria for usernames and passwords during the login attempts.

## Requirements

- Python 3.x
- Internet connection for accessing the target web application
- Necessary permissions to conduct testing on the target system (ensure compliance with ethical hacking practices)

### Additional Notes

- Make sure to obtain permission before running this tool against any web application to avoid legal repercussions.
- RASpray is intended for educational and security assessment purposes only.

## License

This tool is provided for **educational purposes and ethical hacking only**. Make sure you have permission from the network or system owners before testing. Unauthorized use is illegal and punishable by law. This tool is currently under development for a senior thesis under **Professor Jeff Ondich** at **Carleton College**.

## Contributors

- **Amadou Touré** '25, Carleton College. [tourea@carleton.edu](mailto:tourea@carleton.edu)
- **Roo Case** '25, Carleton College. [caser@carleton.edu](mailto:caser@carleton.edu)