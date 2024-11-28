import { IProduct } from "../../types";
import ProductItem from "./ProductItem";

interface Props {
  products: IProduct[];
}

const ProductList = ({ products }: Props): JSX.Element => {
  return (
    <div>
      {products.length ? (
        products.map((product) => <ProductItem product={product} />)
      ) : (
        <div>No products......</div>
      )}
    </div>
  );
};

export default ProductList;
