# Docker Server for RASpray Attacks
## For Carleton College CS Comps, F24

## How to run Docker container
1. Download the "Docker" folder
2. Run `runme.sh`. This will automatically create and run the Docker container. Expect this process to take at least 45 seconds - the server has a lot of prerequisite packages to download, install, and configure.
    * After running the server, you can re-run the container creation by running `docker run -it -p 80:80 target_server /bin/bash` or by finding the container's ID and re-running it.
3. You'll be dropped into a bash shell after the script is done running. **Note: exiting the shell environment will also stop the container.** To interact with the server while it is running, open another shell terminal. The server default accessible from your localhost at port 80.

## License

The server-specific code, configuration, and other elements fall under the GNU GPL license, unless specified otherwise. Apache is under the Apache License, and nginx is under the FreeBSD License. 

## Contributors

- **Amadou Touré** '25, Carleton College. [tourea@carleton.edu](mailto:tourea@carleton.edu)
- **Roo Case** '25, Carleton College. [caser@carleton.edu](mailto:caser@carleton.edu)
