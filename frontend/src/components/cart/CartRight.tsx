import { Link } from "react-router-dom";
import { IProductItem } from "../../types";

interface Props {
  cartItems: IProductItem[];
}

const CartRight = ({ cartItems }: Props): JSX.Element => {
  const getTotalPrice = (): number => {
    return cartItems.reduce((sum, ci) => (sum += ci.price * ci.qty), 0);
  };
  return (
    <div className="bg-gray-100 rounded-md p-4 md:sticky top-0">
      <ul className="text-gray-800 mt-8 space-y-4">
        <li className="flex flex-wrap gap-4 text-base">
          {/* TODO */}
          Discount <span className="ml-auto font-bold">$0.00</span>
        </li>
        <li className="flex flex-wrap gap-4 text-base font-bold">
          Total <span className="ml-auto">${getTotalPrice()}</span>
        </li>
      </ul>

      <div className="mt-8 space-y-2">
        <Link
          to="/checkout"
          className="block text-sm text-center px-4 py-2.5 w-full font-semibold tracking-wide bg-blue-600 hover:bg-blue-700 text-white rounded-md"
        >
          Checkout
        </Link>
        <Link
          to="/"
          className="block text-sm text-center px-4 py-2.5 w-full font-semibold tracking-wide bg-transparent text-gray-800 border border-gray-300 rounded-md"
        >
          Continue Shopping
        </Link>
      </div>
    </div>
  );
};

export default CartRight;
