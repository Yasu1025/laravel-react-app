import { IProduct } from "../../types";
import ProductItem from "./ProductItem";

interface Props {
  products: IProduct[];
}

const ProductList = ({ products }: Props): JSX.Element => {
  return (
    <div className="flex flex-wrap -m-4">
      {products.length ? (
        products.map((product) => (
          <ProductItem key={product.id} product={product} />
        ))
      ) : (
        <div>No products......</div>
      )}
    </div>
  );
};

export default ProductList;
