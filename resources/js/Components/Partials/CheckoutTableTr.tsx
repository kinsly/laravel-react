export default function CheckoutTableTr(
  {
    src,
    title,
    unitPrice,
    quantity,
    totalPrice,
  }:
  {
    src:string,
    title:string,
    unitPrice:number,
    quantity:number,
    totalPrice:number,
  }
)
{
  return(
    <tr>
      <th scope="row">
        <div className="d-flex align-items-center mt-2">
          <img
            src={src}
            className="img-fluid rounded-circle"
            style={{ width: 90, height: 90 }}
            alt=""
          />
        </div>
      </th>
      <td className="py-5">{title}</td>
      <td className="py-5">${unitPrice}</td>
      <td className="py-5">{quantity}</td>
      <td className="py-5">${totalPrice}</td>
    </tr>

  )
}