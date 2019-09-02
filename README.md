# lib-slack

關於 Component 詳細說明：

- 管理 slack 訊息：
 https://api.slack.com/messaging/managing

Components 組成：
- ㄧ、Layout blocks：
 https://api.slack.com/reference/messaging/blocks

- 1. 作為主要元件的容器，主要包含
 - **Section**
 - **Divider**
 - **Image**
 - **Actions**
 - **Context**


- 2. 與 Element 的結合應用：
 1. `Section` 的 `accessory` 欄位可代入一個 element，顯示於 Section 右方 Actions 的 `elements` 欄位可代入多個 elements，組成**多觸發行為** (如多個 Buttons)
 2. `Context` 的 `elements` 欄位可代入多個 `image elements` or `text objects`，作為**唯讀顯示資訊**使用

---

二、Block elements：
 https://api.slack.com/reference/messaging/block-elements

- 1. 主要包含
 - **Image**
 - **Button**
 - **Select Menus**
 - **Overflow Menu**
 - **Date Picker**

- 2. 進階說明：
- **Select Menus** 主要分三種類型：
 1. `static_select`：使用者自訂 menu
 2. `externel_select`：透過 Message Menus 下之 **Options Load URL** 設定固定預設之 options，直接傳入使用
 3. 其他 select：系統預設之選單，包括代入目前之 `users_select`、`conversations_select`、`channels_select` 並提供選項

- 3. 如何達成 Interactive 互動性：
 1. 每個 block 可以設定 block_id 作為觸發判斷使用
 2. 除了 Image 之外的 element 都可以設定 `action_id` 欄位作為觸發判斷使用
 3. 除了 Image 之外的 element 都可以設定 `confirm` 欄位，傳入 `Dialog` 物件觸發彈出視窗功能

---

三、Objects：
 https://api.slack.com/reference/messaging/composition-objects

- 1. 主要包含
 - **Text**
 - **Confirmation dialog**
 - **Option**
 - **Option group**

- 2. 進階說明：
 1. `Text` 中包含 **text** 及 **plain_text** 兩種型態，較廣泛使用的是 `PlainText` Object
 2. `Dialog` 可設定 **title、text、confirm、deny** 四個部分，進階使用如輸入資料還要再研究
 3. `Option` 及 `Option group` 主要提供給 **Select Menus** 及 **Overflow Menu** 使用

---

四、Attachment (已為 legacy，現作為輔助 block 使用)
 https://api.slack.com/reference/messaging/attachments
