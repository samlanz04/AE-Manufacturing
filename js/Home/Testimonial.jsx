const Testimonial = () => {
  return (
    <div id="testimonials" className="testimonial">
      <div className="testim-child1">
        <h1>Testimonial</h1>
        <img src="hr.svg" className="hr" alt="" />
        <p>
          Explore testimonials and witness the positive changes our clients have
          experienced with us.
        </p>
      </div>
      <div className="testim-child2">
        <div className="testim-cont">
          <div className="testim-descr-cont">
            <i
              className="fa-solid fa-quote-right"
              style={{ color: "#ffffff" }}
            ></i>

            <p>
              Comment Comment
            </p>
          </div>
          <div className="photo-cont">
            <div>
              <img src="2.png" className="photo" alt="" />
            </div>

            <div>
              <p className="name">Jessica Kim</p>
              <p className="profess">IT Consultant</p>
              <img src="stars2.svg" alt="" />
            </div>
          </div>
        </div>
        <div className="testim-cont">
          <div className="testim-descr-cont">
            <i
              className="fa-solid fa-quote-right"
              style={{ color: "#ffffff" }}
            ></i>
            <p>
             Comment Comment
            </p>
          </div>
          <div className="photo-cont">
            <div>
              <img className="photo2" src="1.png"alt="" />
            </div>

            <div>
              <p className="name">DAVID WILSON</p>
              <p className="profess">Marketing Specialist</p>
              <img src="stars.svg" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Testimonial;
