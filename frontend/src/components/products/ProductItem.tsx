import { Link } from "react-router-dom";
import { IProduct } from "../../types";

interface Props {
  product: IProduct;
}

const ProductItem = ({ product }: Props): JSX.Element => {
  return (
    <div className="p-4 lg:w-1/3 md:w-1/2">
      <Link
        to={`/product/${product.slug}`}
        className="h-full flex flex-col items-center hover:opacity-80"
      >
        <img
          alt={product.name}
          className="flex-shrink-0 w-full h-56 object-cover object-center "
          src={product.thumbnail}
        />
        <div
          className="w-full border-solid p-2"
          style={{
            border: "1px solid rgba(0,0,0,0.1)",
          }}
        >
          <h2 className="title-font font-medium text-lg text-gray-900 flex justify-between">
            {product.name}
            <span>${product.price}</span>
          </h2>
          <p className="mb-4">{product.desc}</p>
          <div className="flex justify-between">
            <div className="flex">
              {product.sizes.map((size) => (
                <span key={size.id} className="bg-gray-200 ml-1 p-1">
                  {size.name}
                </span>
              ))}
            </div>
            <div>
              {product.status ? (
                <span className="bg-green-300 py-1 px-2">In stock</span>
              ) : (
                <span className="bg-red-500 py-1 px-2 text-white">
                  Out of stock
                </span>
              )}
            </div>
          </div>
          <div className="flex mt-2">
            {product.colors.map((color) => (
              <span
                key={color.id}
                className="bg-gray-200"
                style={{
                  backgroundColor: color.name,
                  border: "1px solid rgba(0,0,0,0.2)",
                  width: "20px",
                  height: "30px",
                }}
              ></span>
            ))}
          </div>
        </div>
      </Link>
    </div>
  );
};

export default ProductItem;
