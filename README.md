## Table Structure
fd_categories = id | name | parent_id
fd_pictures = name | alt | thumbnail_url | fd_item_id
fd_items = title | card_tag | card_info | unit_price | ratings | summary | description (rtf) | fd_category_id
fd_featured_items = fd_items_id

fd_cart = user_id | fd_items_Id | quantity | status

fd_checkout = user_id | total_amount | status | payment_method

fd_checkout_items = fd_checkout_id | user_id | unit_price | quantity | total | isCompleted | picture_url

