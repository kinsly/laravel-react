import { Category, ItemsModel } from "@/types"
import FruitCard from "./Partials/FruitCard"
import { Link } from "@inertiajs/react"
import { useEffect, useState } from "react"

export default function FruitShop(
    {
        items,
        categories,
        handleAddtoCart,
        handleCategoryChange
    }
    :
    {
        items:ItemsModel,
        categories: Category[]
        handleAddtoCart: (id:number)=>void,
        handleCategoryChange: (id:number, slug:string) => void
    })
{
    const [categoryLoading, setCategoryLoading] = useState(false);
    const [currentCategory, setCurrentCategory] = useState(0)

    const categoryChanged = (category_id:number, slug:string) => {
        setCategoryLoading(true);
        setCurrentCategory(category_id);
        handleCategoryChange(category_id, slug)
    }

    useEffect(() => {
        setCategoryLoading(false)
    },[items])

  return(
    <div className="container-fluid fruite py-5">
            <div className="container py-5">
            <div className="tab-class text-center">
                <div className="row g-4">
                <div className="col-lg-4 text-start">
                    <h1>Our Organic Products</h1>
                </div>
                <div className="col-lg-8 text-end">
                    <ul className="nav nav-pills d-inline-flex text-center mb-5">
                    <li className="nav-item">
                        <button
                        onClick={() => categoryChanged(0, '')}
                        className={
                            currentCategory == 0? 
                            ("d-flex py-2 m-2 bg-warning rounded-pill") 
                            : 
                            ("d-flex py-2 m-2 bg-light rounded-pill") 
                        }
                        >
                        <span className="text-dark" style={{ width: 130 }}>
                            All Products { currentCategory == 0 && (categoryLoading) && '...'}
                        </span>
                        </button>
                    </li>
                    {
                        categories.map((category, index) => {
                            return (
                                <li className="nav-item" key={index}>
                                    <button
                                        onClick={() => categoryChanged(category.id, category.slug)}
                                        className=
                                        {
                                            currentCategory == category.id? 
                                            ("d-flex py-2 m-2 bg-warning rounded-pill") 
                                            : 
                                            ("d-flex py-2 m-2 bg-light rounded-pill") 
                                        }
                                        

                                        style={{backgroundColor:"#ffb524 !important"}}>
                                        <span className="text-dark" style={{ width: 130 }}>
                                            {category.name} { currentCategory == category.id && (categoryLoading) && '...'}
                                        </span>
                                    </button>
                                </li>
                            )
                        })
                    }
                    </ul>
                </div>
                </div>
                <div className="tab-content">

                <div id="tab-1" className="tab-pane fade show p-0 active">
                    <div className="row g-4">
                    <div className="col-lg-12">
                        <div className="row g-4">

                        {
                            items.data.map((item, index) => 
                            {
                                return(
                                    <FruitCard
                                        key={index}
                                        id={item.id}
                                        className='col-md-6 col-lg-4 col-xl-3' 
                                        src={item.image?.url} 
                                        tag= "Fruits" 
                                        title={item.title}
                                        description={item.card_info}
                                        price={item.unit_price}
                                        cart={item.carts}
                                        handleAddtoCart = {(id) => handleAddtoCart(parseInt(id))}
                                    />
                                )
                            })
                        }
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
  )
}