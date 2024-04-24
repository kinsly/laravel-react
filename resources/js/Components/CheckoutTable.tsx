import CheckoutTableTr from "./Partials/CheckoutTableTr"

export default function CheckoutTable()
{
  const items = [
    {
      src:"/theme/img/vegetable-item-2.jpg",
      title:"Awesome Brocoli",
      unitPrice:69.00,
      quantity:2,
      totalPrice:138.00,

    },
    {
      src:"/theme/img/vegetable-item-5.jpg",
      title:"Potatoes",
      unitPrice:69.00,
      quantity:2,
      totalPrice:138.00,

    },
    {
      src:"/theme/img/vegetable-item-3.png",
      title:"Big Banana",
      unitPrice:69.00,
      quantity:2,
      totalPrice:138.00,

    },
  ]

  return(
    <table className="table">
    <thead>
      <tr>
        <th scope="col">Products</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Total</th>
      </tr>
    </thead>
    <tbody>

      {
        items.map((item, index) =>
        {
          return <CheckoutTableTr
                  key={index}
                  src = {item.src}
                  title={item.title}
                  unitPrice={item.unitPrice}
                  quantity={item.quantity}
                  totalPrice={item.totalPrice}/>
        })
      }

    </tbody>
  </table>
  )
}