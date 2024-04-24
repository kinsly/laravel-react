import TestimonialCard from "./Partials/TestimonialCard"

export default function Testimonial()
{
    const items = [
        {
            description:"Lorem Ipsum is simply dummy text of the printing Ipsum has been the industry's standard dummy text ever since the 1500s",
            src:"/theme/img/testimonial-1.jpg",
            clientName:"client Name 1",
            profession:"Profession 1"
        },
        {
            description:"Lorem Ipsum is simply dummy text of the printing Ipsum has been the industry's standard dummy text ever since the 1500s",
            src:"/theme/img/testimonial-1.jpg",
            clientName:"client Name 2",
            profession:"Profession 2"
        },
        {
            description:"Lorem Ipsum is simply dummy text of the printing Ipsum has been the industry's standard dummy text ever since the 1500s",
            src:"/theme/img/testimonial-1.jpg",
            clientName:"client Name 3",
            profession:"Profession 1"
        },
        {
            description:"Lorem Ipsum is simply dummy text of the printing Ipsum has been the industry's standard dummy text ever since the 1500s",
            src:"/theme/img/testimonial-1.jpg",
            clientName:"client Name 4",
            profession:"Profession 2"
        }
    ]
  return(
    <div className="container-fluid testimonial py-5">
            <div className="container py-5">
            <div className="testimonial-header text-center">
                <h4 className="text-primary">Our Testimonial</h4>
                <h1 className="display-5 mb-5 text-dark">Our Client Saying!</h1>
            </div>
            <div className="owl-carousel testimonial-carousel">

               {
                items.map((items,index) => {
                    return <TestimonialCard
                                key={index}
                                description={items.description}
                                src={items.src}
                                clientName={items.clientName}
                                profession={items.profession} />
                })
               }

            </div>
            </div>
        </div>
  )
}