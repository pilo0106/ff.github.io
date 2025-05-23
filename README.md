# 友誼信託 Friend Fiduciary

這是一個使用 XAMPP 架設的 PHP 網站專案，包含前端 HTML/CSS、後端 PHP 程式碼，以及使用 MySQL 的資料庫。

目的是提供一個簡易的「借還款登記」平台，使用者可以：
- 新增聯絡人
- 登記借款或還款紀錄
- 查看通知與交易狀態
  
🎬 [實際操作示範影片](https://youtu.be/6mjttFKjilo)


```markdown
## 📁 專案結構
```plaintext
ff/
├── css/ # 樣式表（CSS）
├── img/ # 圖片資源
├── navmenu/ # 導覽列模組
├── php/ # 模組化 PHP 函式
├── scripts/ # JavaScript
├── db/
│ └── friend_fiduciary.sql # MySQL 資料庫備份
│
├── addcontact.php
├── addloanrecord.php
├── addoutstandingrecord.php
├── change_state_ck.php
├── change_state_loan.php
├── change_state_o.php
├── check_login.php
├── contact.php
├── en_addcontact.php
├── en_addloanrecord.php
├── en_addoutstandingrecord.php
├── en_change_state_ck.php
├── en_change_state_loan.php
├── en_change_state_o.php
├── en_check_login.php
├── en_contact.php
├── en_index.php # 英文首頁
├── en_logout.php
├── en_main.php
├── en_record.php
├── en_updatecontact.php
├── en_updatepassword.php
├── en_user_register.php
├── index.php # 中文首頁
├── logout.php
├── main.php
├── record.php
├── updatecontact.php
├── updatepassword.php
├── updatemail.php
├── user.php
├── user_register.php
├── wait.php
└── README.md
```
```

## 🚀 使用方式

1. 安裝 [XAMPP](https://www.apachefriends.org/)
2. 啟動 Apache 與 MySQL
3. 將本專案放入 `htdocs/` 目錄下，例如：

C:\xampp\htdocs\ff\

4. 匯入資料庫：
- 開啟 `http://localhost/phpmyadmin/` (或者`http://localhost:8080/phpmyadmin/`)
- 建立新資料庫（名稱需與程式碼中的一致）
- 匯入 `/db/friend_fiduciary.sql` 檔案

5. 開啟瀏覽器輸入網址：
http://localhost/ff/


## 🧰 使用技術
- PHP 8.x
- HTML5 / CSS3 / JavaScript
- MySQL / phpMyAdmin
- Apache（XAMPP）

## 📦 資料庫說明
請確認已匯入 `/db/friend_fiduciary.sql`，它包含以下資料表：

- `user`：使用者帳號資訊
- `record`：債務記錄（誰欠誰多少錢）
- `contacts`：聯絡人清單
- `notice`：通知訊息
- `callboard`：公告訊息

### 匯入方式

1. 開啟 [phpMyAdmin](http://localhost/phpmyadmin/)
2. 建立名為 `friend_fiduciary` 的資料庫
3. 點選「匯入」→ 選擇此 `.sql` 檔案 → 點「執行」
