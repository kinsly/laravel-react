import { Category } from "@/types"
import { Link, usePage } from "@inertiajs/react"


export default function ItemCategories(
  {
    className,
    categories
  }:
  {
    className:string,
    categories:Category[]
  }
)
{

  const { url } = usePage();
 
  return(
    <div className={className}>
      <h4>Categories</h4>
      <ul className="list-unstyled fruite-categorie">
      <Link preserveScroll href={route('shop')} style={url === '/shop' ? {color:'#e8a71b'} : {}}>
        <i className="fas fa-apple-alt me-2" />
        All
      </Link>
        {
          categories.map((item, index) => 
          {
            return(
              <li key={index}>
                <div className="d-flex justify-content-between fruite-name">
                  
                  <Link preserveScroll href={route('shop-category',[item.id, item.slug])} style={url === '/shop/category/'+item.id+'/'+item.slug ? {color:'#e8a71b'} : {}}>
                    <i className="fas fa-apple-alt me-2" />
                    {item.name}
                  </Link>
                  {/* <span>({item.itemCount})</span> */}
                </div>
              </li>
            )
          })
        }

      </ul>
    </div>

  )
}