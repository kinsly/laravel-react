import { useEffect, useState  } from "react"

export default function CartTableTr(
  {
    id,
    src,
    title,
    unitPrice,
    defaultQuantity,
    changeQuantity,
    removeCartItem
  }:
  {
    id:string,
    src:string,
    title:string,
    unitPrice:number,
    defaultQuantity:number,
    changeQuantity: (order:string, id:number) => void,
    removeCartItem: (id:number) => void
  }
  )
{

  const [quantity, setQuantity] = useState<number>(1);

  useEffect(() => {
    setQuantity(defaultQuantity)
  }, [defaultQuantity])
  
  const handleChangeQuantity = (order:string, id:number) =>{
    if(order== "minus"){
      if(quantity > 1){
        setQuantity(quantity-1);
      }
      

    }else{
      setQuantity(quantity+1);
    }  
    changeQuantity(order,id);
  }

  const handleRemoveCartItem = () => {
    removeCartItem(parseInt(id));
  }


  return(
    <tr>
      <th scope="row">
        <div className="d-flex align-items-center">
          <img
            src={src}
            className="img-fluid me-5 rounded-circle"
            style={{ width: 80, height: 80 }}
            alt=""
          />
        </div>
      </th>
      <td>
        <p className="mb-0 mt-4">{title}</p>
      </td>
      <td>
        <p className="mb-0 mt-4">${unitPrice}</p>
      </td>
      <td>
        <div className="input-group mt-4" style={{ width: 100 }}>
          <div className="input-group-btn">
            <button onClick={() => handleChangeQuantity('minus',parseInt(id))} className="btn btn-sm btn-minus rounded-circle bg-light border">
              <i className="fa fa-minus" />
            </button>
          </div>
          <span
            className="form-control form-control-sm text-center border-0"
            
          >{quantity}</span>
          <div className="input-group-btn">
            <button onClick={() => handleChangeQuantity('plus',parseInt(id))} className="btn btn-sm btn-plus rounded-circle bg-light border">
              <i className="fa fa-plus" />
            </button>
          </div>
        </div>
      </td>
      <td>
        <p className="mb-0 mt-4">${(unitPrice*quantity).toFixed(2)}</p>
      </td>
      <td>
        <button onClick={handleRemoveCartItem} className="btn btn-md rounded-circle bg-light border mt-4">
          <i className="fa fa-times text-danger" />
        </button>
      </td>
    </tr>
  )
}