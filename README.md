# Implementing, Analyzing, and Defending Against Password Spraying Attacks on HTTP-based Authentication Systems


## READMEs

If interested about the specifics of the **server** or **RASpray** setup, please refer to the specific READMe files in the **website** and **tool** folders in the repository, repectively.

**We have set up a dockerized verison of the server we worked on over the term, available in the branch `DockerServerVersion`. Instructions and a packaged release exist in that branch.**

## Project Description & Poster

A detailed description of this project is located in the **Project Description** folder of this repository, which also contains a video demonstration of the tool and its interaction with our server.

A poster-style presentation of this project is also located in our **Project Description** folder.

## Analysis of our tool
   <img width="500" alt="image" src="https://github.com/user-attachments/assets/3b4ee648-9914-40ff-93b2-5270995eaeee">    <img width="500" alt="image" src="https://github.com/user-attachments/assets/cb9816f4-a533-4557-8228-d439a7802a96">

We primarily tested on BasicAuth. This is specifically because Hydra is not easy to set on any other type of login, and BasicAuth is fairly consistently performing on the server-side, whereas PHP can sometimes be a little inconsistent. These two tools are also doing slightly different things, which may skew the data. Hydra is taking in the direct url to the page that is protected by BasicAuth, while RASpray is traversing the website, finding the BasicAuth-protected page and spraying it.  

We can see in the diagrams that our tool is fairly consistent in memory usage between Hydra and RASpray. However, the data looks weirder when we look at overall runtime. There’s two peaks in runtime with our tool and only one for Hydra. We think this is because our tool is running too fast. Hydra is better able to pace itself and fine-tune its delays when it detects that its requests are overwhelming the target server, while RASpray is unable to be as fine-grained, waiting a base amount of 1 second before resuming its spray. 


## License

This repository and its contents are provided for **educational purposes and ethical hacking only**. Make sure you have permission from the network or system owners before testing. Unauthorized use is illegal and punishable by law. This project was developed for a senior thesis under **Professor Jeff Ondich** at **Carleton College**. Fall 2024.

The server-specific code, configuration, and other elements fall under the GNU GPL license, unless specified otherwise. Apache is under the Apache License, and nginx is under the FreeBSD License.

## Contributors

- **Amadou Touré** '25, Carleton College. [tourea@carleton.edu](mailto:tourea@carleton.edu)
- **Roo Case** '25, Carleton College. [caser@carleton.edu](mailto:caser@carleton.edu)
