docker build --no-cache -t target_server . && docker run -it -p 80:80 -p 8080:8080 target_server /bin/bash
