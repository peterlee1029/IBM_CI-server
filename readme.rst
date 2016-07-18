## 伺服器需求

- 建議使用Apache 2.4.9 或以上的版本.
- 建議使用PHP 5.3.3 或以上的版本.
- 建議使用MySQL 5.1.67 或以上的版本.

Windows系統可以直接安裝WAMPServer 2.5 或以上的版本.

## 安裝方式

1. 下載git客戶端http://msysgit.googlecode.com/files/Git-1.8.4-preview20130916.exe

2. 到http://mars.kh.usc.edu.tw:8000/ 或 http://163.15.192.185:8000/ 註冊帳號.

3. 登入後到Profile Settings —> SSH Keys 中新增SSH Key.
    - 打開Git Bash
    - 切換到家目錄，並建立.profile內加上GIT_SSH="/usr/bin/ssh.exe"
        - cd
        - echo GIT_SSH="/usr/bin/ssh.exe" >> .profile
    - 建立SSH KEY
        - mkdir .ssh
        - cd  ~/.ssh
        - ssh-keygen -t rsa -C "你的信箱"
    - 印出id_rsa.pub的內容
        - cat id_rsa.pub
        
4. 新增使用者
    - 打開Git Bash 輸入以下指令
    - git init
    - git config --global user.name "使用者名字"
	- ex : git config --global user.name "peterlee1029"
    - git config --global user.email "使用者信箱"
	- ex : git config --global user.email "peterlee1029@gmail.com"
    - 使用git config --list去確認現在的使用者
        
5. 使用Git Bash將程式clone至伺服器的根目錄(WAMPServer clone至\wamp\www).
    - 先切換(cd)目錄到指定目錄
    - SSH方式 : git clone git@mars.kh.usc.edu.tw:username/projectname.git CodeIgniter
	- ex : git clone git@mars.kh.usc.edu.tw:peterlee1029/IBM_CI-server.git CodeIgniter
    - HTTP方式 : git clone http://mars.kh.usc.edu.tw:8000/shenglow/liugguiki.git CodeIgniter

6. 使用case.sql(位於\CodeIgniter\DB)匯入資料庫.
	- case.sql指令無法執行 

7. 新增資料庫使用者
    - 打開http://localhost/phpmyadmin頁面
    - 點選工具列的『使用者』
    - 點選『新增使用者』
    - 帳號選擇『使用文字方塊』並輸入帳號liugguiki
    - 主機選擇『本機』
    - 密碼選擇『使用文字方塊』並輸入密碼liugguiki
    - 再次輸入密碼
    - 點選最右下方的『執行』
	- 新增一個資料庫名稱
    - 回到『使用者』頁面，找到剛建立的使用者，點選『編輯權限』
    - 於『指定資料庫權限』—> 『在下列資料庫新增權限』—> 選擇『新增資料庫名稱』
    - 勾選『全選』並執行
	- 建議新增資料庫名稱與資料表名稱相同
	- 匯入資料表e7822501至新增資料庫



## Server Requirements

-  Apache version 2.4.9 or newer is recommended.
-  PHP version 5.3.3 or newer is recommended.
-  MySQL version 5.1.67 or newer is recommended.

For Windows user can normally install WAMPServer version 2.5 or newer.

## Installation

1. Download git client at http://msysgit.googlecode.com/files/Git-1.8.4-preview20130916.exe

2. Register an account at http://mars.kh.usc.edu.tw:8000/ or http://163.15.192.185:8000/

3. Login and go to Profile Settings —> SSH Keys add a new SSH Key.
    - Open Git Bash
    - change directory to home directory，create a file name .profile and add GIT_SSH="/usr/bin/ssh.exe" in the file.
        - cd
        - echo GIT_SSH="/usr/bin/ssh.exe" >> .profile
    - Create a SSH KEY
        - mkdir .ssh
        - cd  ~/.ssh
        - ssh-keygen -t rsa -C "your_Email"
    - print content of id_rsa.pub
        - cat id_rsa.pub

4. Add new user
    - Open Git Bash and run the following command
    - git init
    - git config --global user.name "User's name"
	- ex : git config --global user.name "peterlee1029"
    - git config --global user.email "User's email"
	- ex : git config --global user.email "peterlee1029@gmail.com"
    - Use git config --list to check who is the login user 

5. Using git client to clone project to your web server root directory(WAMPServer clone to \wamp\www).
    - change directory(cd) to target directory
    - Using SSH : git clone git@mars.kh.usc.edu.tw:username/projectname.git CodeIgniter
	- ex : git clone git@mars.kh.usc.edu.tw:peterlee1029/IBM_CI-server.git CodeIgniter
    - Using HTTP : git clone http://mars.kh.usc.edu.tw:8000/shenglow/liugguiki.git CodeIgniter

6. Using case.sql(exist in \CodeIgniter\DB) to Import database.