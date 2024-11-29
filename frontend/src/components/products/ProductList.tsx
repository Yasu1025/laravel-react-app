import { useState } from "react";
import { IProduct } from "../../types";
import ProductItem from "./ProductItem";

interface Props {
  products: IProduct[];
}

const ProductList = ({ products }: Props): JSX.Element => {
  const [productsToShow, setProductsToShow] = useState(5);

  const loadMoreProducts = () => {
    if (productsToShow > products.length) return;
    setProductsToShow((prev) => prev + 5);
  };

  return (
    <div className="-m-4">
      <div className="flex flex-wrap ">
        {products.slice(0, productsToShow).map((product) => (
          <ProductItem key={product.id} product={product} />
        ))}
      </div>
      <div className="flex justify-center mt-2">
        {productsToShow < products.length && (
          <button
            onClick={loadMoreProducts}
            className="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"
          >
            LoadMore
          </button>
        )}
      </div>
    </div>
  );
};

export default ProductList;
