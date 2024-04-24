import { ItemsModel, SingleItemModel } from "@/types"
import BestSellerCardhr from "./Partials/BestSellerCardhr"
import BestSellerCardvt from "./Partials/BestSellerCardvt"

export default function BestSeller(
    {
        bestSeller6, 
        nextBestSeller4,
        handleAddtoCart
    }: 
    {
        bestSeller6:SingleItemModel[], 
        nextBestSeller4:SingleItemModel[],
        handleAddtoCart:(id:number) => void
    })
{
    
  return (
    <div className="container-fluid py-5">
            <div className="container py-5">
            <div className="text-center mx-auto mb-5" style={{ maxWidth: 700 }}>
                <h1 className="display-4">Bestseller Products</h1>
                <p>
                Latin words, combined with a handful of model sentence structures, to
                generate Lorem Ipsum which looks reasonable.
                </p>
            </div>
            <div className="row g-4">
            {
                bestSeller6.map((item, index) =>
                {
                    return <BestSellerCardhr
                        id={parseInt(item.id)}
                        key={index}
                        src={item.image.url}
                        title = {item.title}
                        price = {item.unit_price}
                        cart={item.carts}
                        handleAddtoCart={(id) =>handleAddtoCart(id) }
                    />
                })
            }

{
                nextBestSeller4.map((item, index) =>
                {
                    return <BestSellerCardvt
                        id = {parseInt(item.id)}
                        key={index}
                        src={item.image.url}
                        title = {item.title}
                        price = {item.unit_price}
                        cart={item.carts}
                        handleAddtoCart={(id) =>handleAddtoCart(id) }
                    />
                })
            }
                
             
            </div>
            </div>
        </div>
  )
}