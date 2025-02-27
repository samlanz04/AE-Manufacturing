import Products from "./Home/Products";
import Header from "./Header";

const Vehicles = () => {
  return (
    <div className="vehicles">
      <Header />
      <div className="vh-cont">
      <img className="vh_bg1" src="back_n.png" alt="" />
        <div className="vh-topic-cont">
          <h1>TRUCKS</h1>
          <p>Explore wide range of trucks from AEM</p>
          <img src="hr.svg" alt="" />
        </div>
        <div className="vh-main-cont">
          <div>
            <div className="vh-car-cont">
              <img src="5.5.png" alt="" />
              <img src="2.2.png" alt="" />
              <img src="1.1.png" alt="" />
              <img src="4.4.png" alt="" />
            </div>
            <div className="vh-descrp-cont">
              <h1>AEM Trucks</h1>
              <p>
                Explore AEM's Trucks Page for a curated collection of sleek
                sedans, SUVs, high-performance sports cars, eco-friendly
                electric/hybrid trucks, family-friendly minivans, compact city
                cars, and powerful trucks. Nova ensures you find the perfect
                ride for your lifestyle.
              </p>
              <ul>
                <li>
                  <b>Electric Propulsion:</b> AEM Trucks feature advanced
                  electric propulsion for eco-friendly, high-performance
                  driving.
                </li>
                <li>
                  <b>Aerodynamic Design:</b> AEM Trucks showcase a
                  fuel-efficient, aerodynamic design for a modern and visually
                  striking aesthetic.
                </li>
                <li>
                  <b>Connectivity Suite:</b> Nova's futuristic connectivity
                  suite seamlessly integrates navigation, entertainment, and
                  interaction for an enhanced driving experience.
                </li>
              </ul>
              <a href="#booking">Book Now</a>
            </div>
          </div>
          <img className="bg-vh-img" src="iveco-truck-isolated.jpg" alt="" />
          <img className="bg-vh-img2" src="bg_vehicle.jpg" alt="" />
        </div>
      </div>
      <Products />
    </div>
  );
};

export default Vehicles;
