docker build --no-cache -t target_server . && docker run -it -p 80:80 target_server /bin/bash
