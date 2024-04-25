import { PageProps, User } from "@/types"
import { Link } from "@inertiajs/react"

export default function Navigation({user='', cart_item_quantity=0}:{user?:User|'',cart_item_quantity?:number})
{

  return (
    <div className="container-fluid">
        
            <div className="container topbar bg-primary d-none d-lg-block">
            <div className="d-flex justify-content-between">
                <div className="top-info ps-2">
                <small className="me-3">
                    <i className="fas fa-map-marker-alt me-2 text-secondary" />{" "}
                    <a href="#" className="text-white">
                    123 Street, New York
                    </a>
                </small>
                <small className="me-3">
                    <i className="fas fa-envelope me-2 text-secondary" />
                    <a href="#" className="text-white">
                    Email@Example.com
                    </a>
                </small>
                </div>
                <div className="top-link pe-2">
                <a href="#" className="text-white">
                    <small className="text-white mx-2">Privacy Policy</small>/
                </a>
                <a href="#" className="text-white">
                    <small className="text-white mx-2">Terms of Use</small>/
                </a>
                <a href={route('dashboard')} className="text-white">
                    <small className="text-white ms-2">Dashboard</small>
                </a>
                </div>
            </div>
            </div>

            <div className="container px-0">
            <nav className="navbar navbar-light bg-white navbar-expand-xl">
                <Link href={route('home')} className="navbar-brand">
                <h1 className="text-primary display-6">Fruitables</h1>
                </Link>
                <button
                className="navbar-toggler py-2 px-3"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse"
                >
                <span className="fa fa-bars text-primary" />
                </button>
                <div className="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div className="navbar-nav mx-auto">
                    <Link preserveScroll href={route('home')} className="nav-item nav-link active">
                    Home
                    </Link>
                     
                    <Link preserveScroll href={route('shop')} className="nav-item nav-link">
                    Shop
                    </Link>
                    <div className="nav-item dropdown">
                        <a
                            href="#"
                            className="nav-link dropdown-toggle"
                            data-bs-toggle="dropdown"
                        >
                            Pages
                        </a>
                        <div className="dropdown-menu m-0 bg-secondary rounded-0">
                            <Link preserveScroll href={route('cart.index')} className="dropdown-item">
                            Cart
                            </Link>
                            <Link preserveScroll href={route('checkout')} className="dropdown-item">
                            Chackout
                            </Link>
                            <Link preserveScroll href={route('testimonial')} className="dropdown-item">
                            Testimonial
                            </Link>
                            <Link preserveScroll href={route('notfound')} className="dropdown-item">
                            404 Page
                            </Link>
                        </div>
                    </div>
                    <Link href={route('contact')} className="nav-item nav-link">
                    Contact
                    </Link>
                </div>

                <div className="d-flex m-3 me-0">

                    {/* <button
                        className="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4"
                        data-bs-toggle="modal"
                        data-bs-target="#searchModal"
                        >
                        <i className="fas fa-search text-primary" />
                    </button> */}

                    <Link href={route('cart.index')} className="position-relative me-4 my-auto">
                        <i className="fa fa-shopping-bag fa-2x" />
                        <span
                            className="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                            style={{ top: "-5px", left: 15, height: 20, minWidth: 20 }}
                        >
                            {cart_item_quantity}
                        </span>
                    </Link>


                        <div className="nav-item dropdown">
                        {(user != '' && user != null)? 
                        <a
                            href="#"
                            className="nav-link dropdown-toggle"
                            data-bs-toggle="dropdown"
                        >
                             {user?.name.length > 10 ? `${user?.name.slice(0, 10)}...` : user?.name}
                        </a>
                        : 
                        
                        <a  href={route('buyer.registration')}
                                className="nav-link dropdown-toggle my-auto"
                                data-bs-toggle="dropdown"
                            ><i className="fas fa-user fa-2x" /></a>
                        
                        }
                            

                            <div className="dropdown-menu m-0 bg-secondary rounded-0">
                                <Link href={route('profile.edit')} className="dropdown-item">
                                    {user && 
                                    <>
                                     {user.name.length > 10 ? `${user.name.slice(0, 10)}...` : user.name}
                                    </>
                                    } 
                                </Link>
                                {(user != '' && user != null)?
                                    <Link method="post" as="button" preserveScroll href={route('buyer.logout')} className="dropdown-item">
                                    Logout
                                    </Link>
                                    :
                                    <>
                                    <Link preserveScroll href={route('buyer.login')} className="dropdown-item">
                                    Login
                                    </Link>
                                    
                                    <Link preserveScroll href={route('buyer.registration')} className="dropdown-item">
                                    Register
                                    </Link>
                                    </>
                                }
                                
                            </div>
                        </div>
                        {/* dsds */}

                    
                   
                </div>
                </div>
            </nav>
            </div>
        </div>
  )
}