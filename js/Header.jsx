import { useState } from "react";
import { Link } from "react-router-dom";

const Header = () => {
  const [isDropdownOpen, setIsDropdownOpen] = useState(false);
  const [isNavOpen, setIsNavOpen] = useState(false);

  const toggleNav = () => {
    setIsNavOpen(!isNavOpen);
  };

  // Define the toggleDropdown function 
  const toggleDropdown = () => {
    setIsDropdownOpen(!isDropdownOpen);
  };
  // Define the handleSearch function
  const handleSearch = (event) => {
    event.preventDefault();
    const query = event.target.search.value; // Get the search query
    console.log("Search query:", query);
    // Add functionality to handle the search (e.g., redirect to a search results page)
  };

  return (
    <nav className="navbar navbar-expand-sm fixed-top">
      <div className="container-fluid nav-cont">
        <div className="nav-child1">
          <Link className="navbar-brand" to="/">
            <img className="logo logo1" src="logo11.png" alt="" />
          </Link>
          {/* Hamburger Menu for the dropdown */}
          <div className="hamburger-dropdown">
            <button className="hamburger-icon" onClick={toggleDropdown}>
              <div className="icon-line"></div>
              <div className="icon-line"></div>
              <div className="icon-line"></div>
            </button>
            {isDropdownOpen && (
              <ul className={`dropdown-menu ${isDropdownOpen ? 'show' : ''}`}>
                <li>
                <Link className="nav-link" to="/vehicles">
                  Trucks
                </Link>
                </li>
                <li>
                  <Link to="/parts">Parts & Spares</Link>
                </li>
                <li>
                  <Link to="/services">Services</Link>
                </li>
                <li>
                  <Link to="/manufacture">Manufacture</Link>
                </li>
                <li>
                  <Link to="/shop-by-industry">Shop by Industry</Link>
                </li>
                <li>
                  <Link to="/waste-water">Waste & Water</Link>
                </li>
                <li>
                  <Link to="/mining">Mining</Link>
                </li>
                <li>
                  <Link to="/agriculture">Agriculture</Link>
                </li>
                <li>
                  <Link to="/transportation">Transportation</Link>
                </li>
                <li>
                <Link className="nav-link" to="/about">
                  About
                </Link>
                </li>
                <li>
                <Link className="nav-link" to="/contact">
                  Contact
                </Link>
                </li>
              </ul>
            )}
          </div>
        </div>

        <div className="nav-child2a">
          <button
            className="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown"
          >
            <span className="navbar-toggler-icon"></span>
          </button>

        {/* Search bar */}
        <div className="navbar-collapse collapse" id="navbarNavDropdown">
  <div className="search-box">
    <form className="d-flex" role="search" onSubmit={handleSearch}>
      <input
        className="form-control me-2 search-input"
        type="search"
        name="search"
        placeholder="Search"
        aria-label="Search"
      />
      <button className="btn btn-outline-success search-btn" type="submit">
        Search
      </button>
    </form>
  </div>
</div>


        </div>

        <div className="nav-child2b">
          <div
            className={`hamburger-icon ${isNavOpen && "gap"}`}
            id="icon"
            onClick={toggleNav}
          >
            <div className={`icon-1 ${isNavOpen && "a"}`} id="a"></div>
            <div className={`icon-2 ${isNavOpen && "c"}`} id="b"></div>
            <div className={`icon-3 ${isNavOpen && "b"}`} id="c"></div>
          </div>

          <div id="nav" className={isNavOpen ? "show" : ""}>
            <ul className="ul">
              <li className="li li1">
                <Link to="/">Home</Link>
              </li>
              <li className="li li2">
                <Link to="/vehicles">Vehicles</Link>
              </li>
              <li className="li li3">
                <Link to="/about">About</Link>
              </li>
              <li className="li li4">
                <a href="#testimonials">Testimonials</a>
              </li>
              <li className="li li5">
                <Link to="/contact">Contact</Link>
              </li>
              <li className="li">
                <button className="sign">Sign up &gt;</button>
              </li>
            </ul>
          </div>
        </div>

        <div className="nav-child3">
          <i
            className="fa-regular fa-circle-user account"
            onClick={() =>
              window.location.href =
                "https://aem-auth.auth.eu-central-1.amazoncognito.com/login?client_id=7mfcsskaar6vp6bj0h2bj700et&response_type=code&scope=email+openid+phone&redirect_uri=http%3A%2F%2Flocalhost%3A3000%2Fproduct%2Fundefined'"
            }
          ></i>
        </div>
      </div>
    </nav>
  );
};

export default Header;
