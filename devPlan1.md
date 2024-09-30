**Project Title:**  
Implementing and Analyzing Password Spraying Attacks on SSH and HTTP Authentication Systems

**Team Members:**  
- Amadou Touré
- Roo Case

---

## **Project Description**

We effectively aim to design and implement a password spraying tool targeting SSH and HTTP authentication mechanisms. 

Password spraying: A technique where an attacker tries a common / many password(s) against a / many username(s) to avoid account lockouts. Our project involves:

- Setting up a controlled server environment with SSH and HTTP authentication.
- Developing a password spraying application similar to Hydra or Brutus.
- Implementing techniques to bypass time-based authentication restrictions and evade detection.
- Analyzing the effectiveness of the tool and exploring mitigation strategies.

---

## **Our Senior Thesis (COMPS) Learning Goals**

1. **Server and Website Administration:**
   - Learn best practices for securely setting up and managing servers.
   - Understand configuration and management of SSH and HTTP services.

2. **SSH and HTTP Protocols:**
   - Gain in-depth knowledge of SSH and HTTP authentication mechanisms.
   - Explore vulnerabilities within these protocols that can be exploited.

3. **Password Spraying Techniques:**
   - Understand how password spraying attacks are conducted.
   - Learn about the limitations and detection methods of such attacks.

4. **Security Tools Development:**
   - Develop skills in creating network security tools.
   - Enhance programming abilities in relevant languages (e.g., Python, C).

5. **Detection and Mitigation Strategies:**
   - Explore methods for detecting password spraying attacks.
   - Learn about AI/ML applications in cybersecurity for anomaly detection.

6. **Ethical Hacking Practices:**
   - Understand the ethical considerations and legal implications of penetration testing.
   - Learn about responsible disclosure and compliance with cybersecurity laws.

---

## **Development Goals**

### **Primary Goals**

1. **Server Setup:**
   - Configure a secure server environment with SSH and HTTP authentication.
   - Create multiple user accounts with various privilege levels (admin, user, viewer).
   - Implement diverse password policies to simulate real-world scenarios.

2. **Password Spraying Application:**
   - Develop a tool to perform password spraying attacks over SSH and HTTP.
   - Implement features to:
     - Rotate passwords across different accounts.
     - Adjust timing to bypass time-based authentication locks.
     - Randomize attack patterns to evade detection.
   - Ensure the tool mimics real-world attack methods (e.g., not pre-hashing passwords).

3. **Bypassing Authentication Restrictions:**
   - Implement techniques to bypass time-based authentication mechanisms.
   - Explore methods to trick security measures and avoid account lockouts.

### **Secondary Goals**

1. **Expand to Additional Protocols:**
   - Extend the tool to target RDP (Remote Desktop Protocol) services.
   - Integrate with Microsoft Active Directory for complex authentication environments.

2. **Security Analysis and Detection:**
   - Develop tools for frequency and traffic analysis.
   - Implement AI/ML models for detecting anomalous authentication patterns.

3. **Privilege Escalation Techniques:**
   - Simulate post-authentication scenarios to elevate access privileges.

### **StrEEEEEEEEEEtch Goals**

1. **Distributed Password Spraying:**
   - Implement distributed attacks across multiple devices (DDoS-style spraying).
   - Utilize VPNs or proxies to distribute attack traffic and avoid IP blocking.

2. **Advanced Evasion Techniques:**
   - Research and implement methods to bypass Intrusion Detection Systems (IDS) and Intrusion Prevention Systems (IPS).

3. **Mitigation Tools:**
   - Develop tools or scripts to detect and mitigate password spraying attacks in real-time.

---

## **Testing and Benchmarking Plan**

### **Testing for Correctness**

- **Functional Testing:**
  - Verify the tool correctly attempts authentication with the intended usernames and passwords.
  - Make sure that it operates correctly over SSH and HTTP protocols.

- **Edge Case Testing:**
  - Testing the tool's behavior with invalid inputs, such as non-existent usernames or network failures.
  - Confirm that all the proper error handling and reporting mechanisms are in place.

- **Security Testing:**
  - Make sure that the tool does not cause unintended side effects on the server.
  - Test the tool against various server configurations and security settings.

### **Benchmarking for Performance**

- **Efficiency Measurement:**
  - Measure the rate of authentication attempts under different configurations.
  - Evaluate the impact of timing adjustments and evasion techniques on performance.

- **Resource Utilization:**
  - Monitor CPU, memory, and network usage during attacks.
  - Optimize the tool to minimize resource consumption without sacrificing effectiveness.

- **Effectiveness Analysis:**
  - Assess the success rate of password spraying attacks under different scenarios.
  - Evaluate the tool's ability to evade detection over time.

### **Testing Environment**

- We will use an isolated virtual machines or containers to safely conduct tests.
- Implement comprehensive logging on both the attacking tool and target servers.
- Ensure compliance with ethical guidelines and legal requirements.

---

## **Development Schedule**

### **Week 3 (Sep 30 - Oct 6): Research and Planning**

- **Monday (Sep 30):**
  - **Kick-off Meeting:**
    - Finalize project scope and objectives.
    - Assign roles and responsibilities.

- **Tuesday - Thursday:**
  - **Roo:**
    - Research server setup and security best practices for SSH and HTTP.
  - **Amadou:**
    - Research password spraying techniques and existing tools (Hydra, Brutus).

- **Friday:**
  - **Joint Session:**
    - Share research findings.
    - Decide on development tools and programming languages (e.g., Python for scripting).

- **Weekend:**
  - Set up project repository (Git) and initial documentation (README, project plan).

### **Week 4 (Oct 7 - Oct 13): Server Setup and Initial Tool Development**

- **Monday - Wednesday:**
  - **Roo:**
    - Set up virtual servers with SSH and HTTP services.
    - Create user accounts with varying privileges.
  - **Amadou:**
    - Set up development environment.
    - Start coding the basic framework of the password spraying tool.

- **Thursday - Friday:**
  - **Roo:**
    - Implement security configurations (password policies, login attempt limits).
  - **Amadou:**
    - Implement basic SSH and HTTP connection functions in the tool.

- **Weekend:**
  - **Joint Testing:**
    - Test basic connectivity and authentication attempts with the tool.

### **Week 5 (Oct 14 - Oct 20): Tool Enhancement and Server Hardening**

- **Monday - Wednesday:**
  - **Amadou:**
    - Implement password rotation logic to avoid account lockouts.
    - Add functionality to read usernames and passwords from files.
  - **Roo:**
    - Harden server security settings.
    - Configure detailed logging for authentication attempts.

- **Thursday - Friday:**
  - **Amadou:**
    - Add timing adjustments to bypass time-based authentication restrictions.
  - **Roo:**
    - Set up monitoring tools to detect brute-force attacks.

- **Weekend:**
  - **Joint Testing:**
    - Test the tool's effectiveness against the hardened server.

### **Week 6 (Oct 21 - Oct 27): Evasion Techniques and Secondary Goals**

- **Monday - Wednesday:**
  - **Amadou:**
    - Implement randomization in attack patterns to evade detection.
    - Integrate features to mimic legitimate traffic (e.g., user-agent spoofing).
  - **Roo:**
    - Set up RDP services and integrate with Active Directory.
    - Configure security measures for RDP.

- **Thursday - Friday:**
  - **Amadou:**
    - Extend the tool to target RDP services.
  - **Roo:**
    - Test the tool against RDP authentication.

- **Weekend:**
  - **Mid-Project Review:**
    - Assess progress and adjust timelines or goals as necessary.

### **Week 7 (Oct 28 - Nov 3): Security Analysis and AI/ML Integration**

- **Monday - Wednesday:**
  - **Roo:**
    - Develop scripts for frequency and traffic analysis.
    - Begin implementing AI/ML models for anomaly detection using server logs.
  - **Amadou:**
    - Implement logging and reporting features in the tool.
    - Explore post-authentication strategies for privilege escalation.

- **Thursday - Friday:**
  - **Roo:**
    - Train AI/ML models with attack and normal traffic data.
  - **Amadou:**
    - Test and refine post-authentication techniques.

- **Weekend:**
  - **Joint Session:**
    - Integrate detection mechanisms with server security.
    - Test the effectiveness of AI/ML models.

### **Week 8 (Nov 4 - Nov 10): Preliminary Presentation and Stretch Goals**

- **Monday - Wednesday:**
  - **Amadou:**
    - Implement distributed password spraying capabilities.
    - Integrate VPN/proxy support to distribute attack traffic.
  - **Roo:**
    - Enhance server defenses against distributed attacks.
    - Update AI/ML models to detect distributed patterns.

- **Thursday:**
  - **Amadou and Roo:**
    - Prepare the preliminary presentation slides.
    - Compile progress and results achieved so far.
    - Rehearse the presentation.

- **Friday:**
  - **Preliminary Presentation:**
    - Deliver the preliminary presentation to peers and advisors.
    - Collect feedback and suggestions.

- **Weekend:**
  - **Joint Session:**
    - Reflect on feedback from the preliminary presentation.
    - Adjust plans and prioritize tasks based on input received.

### **Week 9 (Nov 11 - Nov 17): Final Development and Final Presentation Preparation**

- **Monday - Tuesday:**
  - **Amadou:**
    - Finalize all tool features and ensure stability.
    - Optimize code for efficiency and low resource usage.
  - **Roo:**
    - Develop real-time mitigation tools (e.g., automated IP blocking).
    - Document server configurations and security policies.

- **Wednesday:**
  - **Amadou and Roo:**
    - Begin preparing the final presentation slides.
    - Start compiling the final report and documentation.

- **Thursday:**
  - **Amadou and Roo:**
    - Complete the final presentation slides.
    - Prepare demonstration videos or live demo setups.
    - Rehearse the presentation thoroughly.

- **Friday (Nov 17):**
  - **Final Presentation:**
    - Deliver the final presentation to the evaluation committee.
    - Engage in Q&A and note any final feedback.

- **Weekend:**
  - **Joint Session:**
    - Incorporate feedback from the final presentation into the final report.
    - Make any necessary adjustments to the project deliverables.

### **Week 10 (Nov 18 - Nov 24): Final Documentation and Project Submission**

- **Monday - Wednesday:**
  - **Amadou and Roo:**
    - Complete all project documentation, including user guides, technical manuals, and the final report.
    - Prepare data analysis and graphs to support findings and conclusions.

- **Thursday - Friday:**
  - **Amadou and Roo:**
    - Review all deliverables for completeness and quality.
    - Conduct a final code review and clean up any remaining issues.
    - Ensure all documentation is clear, professional, and well-organized.

- **Saturday (Nov 25):**
  - **Project Submission:**
    - Submit all final project deliverables by the deadline.
    - Confirm receipt and address any last-minute requirements.


- **Week 8 (Nov 4 - Nov 10):** Preliminary Presentation
  - Showcase progress, initial findings, and demonstrate basic functionalities.
  - Receive feedback to guide final development stages.

- **Week 9 (Nov 11 - Nov 17):** Final Presentation
  - Present the completed project, including demonstrations of the tool and defense mechanisms.
  - Highlight analysis, results, and conclusions.

- **November 25:** Final Project Submission
  - Submit all deliverables, including code, documentation, and the final report.
  - Ensure all project components meet or exceed expectations.


---

## **Work Allocation**

- **Roo (Server Specialist and Security Analyst):**
  - Setting up and securing the server environment.
  - Configuring and managing SSH, HTTP, and RDP services.
  - Developing mitigation strategies and tools.

- **Amadou (Tool Developer and Attack Specialist):**
  - Designing and coding the password spraying tool.
  - Exploring post-authentication privilege escalation methods.
  - Optimizing the tool for performance and stealth.

- **Joint Task:**
  - Implementing AI/ML models for attack detection.
  - Implementing evasion and advanced attack techniques.
---

## **Deliverables**

1. **Password Spraying Tool:**
   - Source code with comments and documentation.
   - User manual detailing installation and usage instructions.

2. **Server Configuration Documentation:**
   - Detailed steps for setting up the server environment.
   - Security configurations and policies implemented.

3. **Security Analysis Tools:**
   - Scripts and AI/ML models used for detection.
   - Documentation on how to deploy and use these tools.

4. **Final Report:**
   - Introduction to password spraying and its implications.
   - Methodology and implementation details.
   - Analysis of attack effectiveness and detection strategies.
   - Conclusions and recommendations for future work.

5. **Presentation:**
   - Slide deck summarizing the project.
   - Demonstrations of the tool and security measures.
   - Q&A preparation (poster presentation).

---

## **Testing and Validation**

- **Iterative Testing:**
  - Conduct testing at each development stage to ensure functionality.
  - Use controlled environments to safely test attacks and defenses.

- **Peer Review:**
  - Seek feedback from classmates or advisors on the tool and documentation.
  - Incorporate suggestions to improve the project.

- **Final Validation:**
  - Verify that all project goals have been met.
  - Ensure compliance with ethical guidelines.

---

## **Risk Management**

- **Technical Challenges:**
  - **Risk:** Difficulty implementing advanced evasion techniques.
    - **Mitigation:** Allocate additional time and seek expert advice.
  - **Risk:** AI/ML models may not detect attacks effectively.
    - **Mitigation:** Use multiple detection methods and fine-tune models with more data.

- **Time Constraints:**
  - **Risk:** Falling behind schedule due to unforeseen obstacles.
    - **Mitigation:** Regularly review progress and adjust the plan as needed. Also, we don't necessarily want to cover everything in this document. Most are longshot goals.
   




