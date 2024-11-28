import { RouterProvider } from "react-router-dom";
import routes from "./routes";
import Header from "./components/layouts/Header";

const App = (): JSX.Element => {
  return (
    <>
      <Header />
      <div className="container mx-auto">
        <RouterProvider router={routes} />
      </div>
    </>
  );
};

export default App;
