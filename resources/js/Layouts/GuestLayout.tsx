import Copyrights from '@/Components/Copyrights';
import Footer from '@/Components/Footer';
import ModalSearch from '@/Components/ModelSearch';
import Navigation from '@/Components/Navigation';
import { User } from '@/types';

import { Link } from '@inertiajs/react';
import { PropsWithChildren, useEffect } from 'react';

export function loadScript(src: string): Promise<void> {
    return new Promise<void>((resolve, reject) => {
      const script = document.createElement('script');
      script.src = src;
      script.onload = () => resolve();
      script.onerror = (error) => reject(error);
      document.head.appendChild(script);
    });
  }
  
  async function loadScripts() {
    try {
      await loadScript("/theme/js/main.js");      
      
    } catch (error) {
      console.error("Error loading script:", error);
    }
  }


export default function GuestLayout({user='', children, cart_item_quantity=0 }: PropsWithChildren<{user?:User|'', cart_item_quantity?:number}>) {
    
    useEffect(()=>{
        loadScripts();
    },[]) 
    
    return (
        <>
         {/* Navbar start */}
            <Navigation user={user} cart_item_quantity={cart_item_quantity}/>
        {/* Navbar End */}

        {/* Modal Search Start */}
        <ModalSearch/>
        {/* Modal Search End */}
       
        {children}
       
        {/* Footer Start */}
        <Footer/>
        {/* Footer End */}

        {/* Copyright Start */}
        <Copyrights/>
        {/* Copyright End */}

        {/* Back to Top */}         
</> );
}
