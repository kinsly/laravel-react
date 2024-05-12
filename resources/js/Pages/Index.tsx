import { Link, Head, router } from '@inertiajs/react';
import { Category, ItemsModel, PageProps, SingleItemModel } from '@/types';
import GuestLayout from '@/Layouts/GuestLayout';
import Banner from '@/Components/Banner';
import BestSeller from '@/Components/BestSeller';
import Fact from '@/Components/Fact';
import FeatureAds from '@/Components/FeatureAds';
import Features from '@/Components/Features';

import FruitShop from '@/Components/FruitsShop';
import Hero from '@/Components/Hero';
import Testimonial from '@/Components/Testimonial';
import VegetableShop from '@/Components/VegetableShop';
import { PropsWithChildren, useState } from 'react';
import axios from 'axios';

export default function Index(
    {items, auth,cart_item_quantity,categories,
      nextBestSeller4, bestSeller6
    }:
    PageProps<{items:ItemsModel, categories:Category[], nextBestSeller4:SingleItemModel[], bestSeller6:SingleItemModel[]}>) {
      
    const [fruits, setFruits] = useState(items);

    const handleAddtoCart = (id:number) =>
        { 
          var url = route('cart.store');
          router.visit(url, {
            method:'post',
            data: {id, 'quantity':1},
            preserveState: true,
            replace: false,
            preserveScroll: true,
            onStart: visit => {console.log(visit)},
            onProgress: progress => {console.log(progress)},
            onSuccess: (page)=> {},
            onError: errors => {},
            onFinish: visit => {},
          })
      
    }

    const handleCategoryChange = (id:number, slug:string) =>{
        var url = route('home.getItemsByCategory',[id, slug]);
        axios({
            method: 'post',
            url,
          }).then(function (response) {
            setFruits(response);
          });
    }
    
    return (
    <GuestLayout user={auth?.user} cart_item_quantity={cart_item_quantity}>
        <Head title="Home - Buy all types of fruits at lowest price"/>
        {/* Hero Start */}
        <Hero/>
        {/* Hero End */}

        {/* Featurs Section Start */}
        <Features/>
        {/* Featurs Section End */}

        {/* Fruits Shop Start*/}
        <FruitShop 
            items={fruits}
            categories={categories}
            handleAddtoCart = {(id) => handleAddtoCart(id)}
            handleCategoryChange={ (id, slug) => handleCategoryChange(id,slug)}
        />
        {/* Fruits Shop End*/}

        {/* Featurs ads */}
        <FeatureAds/>
        {/* Featurs ads end */}

        {/* Vesitable Shop Start*/}
        <VegetableShop 
            items={items}
            handleAddtoCart={(id) => handleAddtoCart(id)}
        />
        {/* Vesitable Shop End */}

        {/* Banner Section Start*/}
        <Banner/>
        {/* Banner Section End */}

        {/* Bestsaler Product Start */}
        <BestSeller
          bestSeller6={bestSeller6}
          nextBestSeller4={nextBestSeller4}
          handleAddtoCart={(id) => handleAddtoCart(id)}
        />
        {/* Bestsaler Product End */}

        {/* Fact Start */}
        <Fact/>
        {/* Fact Start */}

        {/* Tastimonial Start */}
        <Testimonial/>
        {/* Tastimonial End */}

    </GuestLayout>
    );
}
