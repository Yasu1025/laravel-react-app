import { BrowserRouter, Route, Routes } from "react-router-dom";
import routes from "./routes";
import Header from "./components/layouts/Header";

const App = (): JSX.Element => {
  return (
    <BrowserRouter>
      <Header />
      <div className="container mx-auto py-8 px-4">
        <Routes>
          {routes.map((r) => (
            <Route key={r.path} path={r.path} element={r.element} />
          ))}
        </Routes>
      </div>
    </BrowserRouter>
  );
};

export default App;
