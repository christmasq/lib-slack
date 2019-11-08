# lib-slack

##如何使用此套件：

 - 建立 Block 物件
 ```
 $block = new Block();
 ```
 
 - Block 有 5 種 Layout block
 ```
 Block::TYPE_SECTION = 'section';
 Block::TYPE_DIVIDER = 'divider';
 Block::TYPE_IMAGE = 'image';
 Block::TYPE_ACTIONS = 'actions';
 Block::TYPE_CONTEXT = 'context';
 ```
 
 - 加入需要的 Layout blocks
 ```
 $block->addSection($text, array $params);
 $block->addImage($image_url, $alt_text, array $params);
 $block->addAction(array $elements, $block_id);
 $block->addContext(array $elements, $block_id);
 $block->addDivider($block_id);
 ```
 
 - 若是屬於 Action 或 Context，則建立 Block elements 並加入，主要共有 6 種 elements (select menu 包含 5 種型態)
 ```
 Element::TYPE_BUTTON = 'button';
 Element::TYPE_IMAGE = 'image';
 Element::TYPE_STATIC_SELECT = 'static_select';
 Element::TYPE_EXTERNAL_SELECT = 'external_select';
 Element::TYPE_USERS_SELECT = 'users_select';
 Element::TYPE_CONVERSATIONS_SELECT = 'conversations_select';
 Element::TYPE_CHANNELS_SELECT = 'channels_select';
 Element::TYPE_OVERFLOW = 'overflow';
 Element::TYPE_DATE_PICKER = 'date_picker';
 ```
 
 - 建立 Element 物件並加入 block elements，其中 select menu 以 type 區分要加入的 element object
 ```
 $element = new Element();
 $element->addButton($text, $action_id, array $params);
 $element->addImage(string $image_url, string $alt_text);
 $element->addSelectMenu(string $type, $placeholder, string $action_id, array $params);
 $element->addOverflow(string $action_id, array $options, Dialog $confirm);
 $element->addDatePicker(string $action_id, Dialog $confirm, string $initial_date);
 $element->addText($text);
 ```
 
 - 將 element 加入到 layout block 中 (以 Action 為例)
 ```
 $block->addAction($element->elements, $block_id);
 ```
 
 - 輸出 block 成 array 型態，postMessage 時代入參數送出
 ```
 //$block->blocks 為  array type
 
 $params = [
    'token' => $token,
    'channel' => $channel,
    'text' => $text,
    'blocks' => json_encode($block->blocks)
 ];
 
 // call slack chat postMessage api
 $client = GuzzleHttp\Client();
 $res = $client->request('POST', https://slack.com/api/chat.postMessage, [
    'form_params' => $params,
 ]);
 return json_decode($res->getBody());
 ```

---

##Components 組成說明：

###Layout blocks：
 https://api.slack.com/reference/messaging/blocks

 - 作為主要元件的容器，主要包含
   - **Section**
   - **Divider**
   - **Image**
   - **Actions**
   - **Context**

 - 與 Element 的結合應用：
   -  `Section` 的 `accessory` 欄位可代入一個 element，顯示於 Section 右方 Actions 的 `elements` 欄位可代入多個 elements，組成**多觸發行為** (如多個 Buttons)
   -  `Context` 的 `elements` 欄位可代入多個 `image elements` or `text objects`，作為**唯讀顯示資訊**使用

###Block elements：
 https://api.slack.com/reference/messaging/block-elements

 - 主要包含
   - **Image**
   - **Button**
   - **Select Menus**
   - **Overflow Menu**
   - **Date Picker**

 - 進階說明：
   - **Select Menus** 主要分三種類型：
     -  `static_select`：使用者自訂 menu
     -  `externel_select`：透過 Message Menus 下之 **Options Load URL** 設定固定預設之 options，直接傳入使用
     -  其他 select：系統預設之選單，包括代入目前之 `users_select`、`conversations_select`、`channels_select` 並提供選項

 - 如何達成 Interactive 互動性：
   -  每個 block 可以設定 block_id 作為觸發判斷使用
   -  除了 Image 之外的 element 都可以設定 `action_id` 欄位作為觸發判斷使用
   -  除了 Image 之外的 element 都可以設定 `confirm` 欄位，傳入 `Dialog` 物件觸發彈出視窗功能

###Objects：
 https://api.slack.com/reference/messaging/composition-objects

 - 主要包含
   - **Text**
   - **Confirmation dialog**
   - **Option**
   - **Option group**

 - 進階說明：
   - `Text` 中包含 **text** 及 **plain_text** 兩種型態，較廣泛使用的是 `PlainText` Object
   - `Dialog` 可設定 **title、text、confirm、deny** 四個部分，進階使用如輸入資料還要再研究
   - `Option` 及 `Option group` 主要提供給 **Select Menus** 及 **Overflow Menu** 使用

###Attachment (已為 legacy，現作為輔助 block 使用)
 https://api.slack.com/reference/messaging/attachments
