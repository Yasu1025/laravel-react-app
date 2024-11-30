import Cart from "../components/cart/Cart";
import Checkout from "../components/checkout/Checkout";
import Home from "../components/Home";
import Product from "../components/products/Product";

const routes = [
  {
    path: "/",
    element: <Home />,
  },
  {
    path: "/product/:slug",
    element: <Product />,
  },
  {
    path: "/cart",
    element: <Cart />,
  },
  {
    path: "/checkout",
    element: <Checkout />,
  },
];

export default routes;
