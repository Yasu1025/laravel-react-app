import CartIcon from "../parts/CartIcon";

const Nav = () => {
  return (
    <>
      <nav className="md:ml-auto flex flex-wrap items-center text-base justify-center">
        <a className="mr-5 hover:text-gray-900">First Link</a>
      </nav>
      <CartIcon />
      <button className="inline-flex items-center bg-gray-100 border-0 py-1 px-3 ml-4 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">
        Button
        <svg
          fill="none"
          stroke="currentColor"
          strokeLinecap="round"
          strokeLinejoin="round"
          strokeWidth="2"
          className="w-4 h-4 ml-1"
          viewBox="0 0 24 24"
        >
          <path d="M5 12h14M12 5l7 7-7 7"></path>
        </svg>
      </button>
    </>
  );
};

export default Nav;
