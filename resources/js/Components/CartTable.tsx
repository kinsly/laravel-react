import { Cart, CartItem, SingleItemModel } from "@/types"
import CartTableTr from "./Partials/CartTableTr"

export default function CartTable(
  {
    cartItems=null,
    changeQuantity,
    removeCartItem
  }:{
    cartItems:CartItem[]| null,
    changeQuantity: (order:string, product_id:number) => void,
    removeCartItem: (id:number) => void
  }){
 
  return(
  <table className="table">
    <thead>
      <tr>
        <th scope="col">Products</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Total</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>

    {
      cartItems == null ?
      <tr>
        <td colSpan={6}>empty</td>
      </tr>:
      <>
       {
        cartItems?.map((cartItem, index) =>
        {
          return <CartTableTr
                    key={index}
                    id={cartItem.id}
                    src={cartItem.item.image?.url}
                    title={cartItem.item.title}
                    unitPrice={cartItem.item.unit_price}
                    defaultQuantity={cartItem.quantity}
                    changeQuantity={(order, product_id) => changeQuantity(order, product_id)}
                    removeCartItem={(id) => removeCartItem(id)}
                  />
        })
      }
      </>

    }
    </tbody>
  </table>
    
  )
}