export default function SingleItemPicture({image}:{image:string})
{
  return (
    <div className="border rounded">
          <a href="#">
            <img
              src={image}
              className="img-fluid rounded"
              alt="Image"
            />
          </a>
        </div>
  )
}