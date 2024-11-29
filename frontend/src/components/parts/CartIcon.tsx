import { Link } from "react-router-dom";
import { useAppSelector } from "../../redux/store/hooks";

const CartIcon = (): JSX.Element => {
  const { cartItems } = useAppSelector((state) => state.cart);

  return (
    <Link to="cart" className="relative">
      <svg
        className="w-10 h-10 text-white"
        fill="none"
        stroke="currentColor"
        viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          strokeLinecap="round"
          strokeLinejoin="round"
          strokeWidth="2"
          d="M3 3h2l3.6 7.2 1.1 2.2h5.4l1.1-2.2L19 3h2M3 3l1 14h14l1-14M6 10h12"
        ></path>
      </svg>
      <span className="absolute top-0 right-0 inline-flex items-center justify-center w-5 h-5 text-xs font-semibold text-red-100 bg-red-600 rounded-full">
        {cartItems.length}
      </span>
    </Link>
  );
};

export default CartIcon;
