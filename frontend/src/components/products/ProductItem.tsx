import { IProduct } from "../../types";

interface Props {
  product: IProduct;
}

const ProductItem = (props: Props): JSX.Element => {
  return <div>{props.product.name}</div>;
};

export default ProductItem;
