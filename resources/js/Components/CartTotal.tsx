import { CartItem } from "@/types";
import { useState } from "react";

export default function CartTotal({cartItems=[]}:{cartItems:CartItem[]})
{
  // const [total, setTotal] = useState(0);

  var total = 0;
  cartItems.map((cartItem,index) =>{
    var price = cartItem.item.unit_price * cartItem.quantity;
    total = total+price;

  })

  return(
    <div className="bg-light rounded">
    <div className="p-4">
      <h1 className="display-6 mb-4">
        Cart <span className="fw-normal">Total</span>
      </h1>
      <div className="d-flex justify-content-between mb-4">
        <h5 className="mb-0 me-4">Subtotal:</h5>
        <p className="mb-0">{total}</p>
      </div>
      <div className="d-flex justify-content-between">
        <h5 className="mb-0 me-4">Shipping</h5>
        <div className="">
          <p className="mb-0">Flat rate: $3.00</p>
        </div>
      </div>
      <p className="mb-0 text-end">Shipping to your Country.</p>
    </div>
    <div className="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
      <h5 className="mb-0 ps-4 me-4">Total</h5>
      <p className="mb-0 pe-4">${total+3}</p>
    </div>
    <button
      className="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4"
      type="button"
    >
      Proceed Checkout
    </button>
  </div>
  )
}