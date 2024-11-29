import { createBrowserRouter } from "react-router-dom";
import Home from "../components/Home";
import Product from "../components/products/Product";

const routes = createBrowserRouter([
  {
    path: "/",
    element: <Home />,
  },
  {
    path: "/product/:slug",
    element: <Product />,
  },
]);

export default routes;
