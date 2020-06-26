import React, { Component } from "react";

export class Foter extends Component {
  render() {
    return (
      <div className="footer" id="fot">
        <div className="inner_footer">
          <div className="footer_third">
            <h1>تحتاج الى المساعدة</h1>
            <a href="/">شروط الاستعمال</a>
            <a href="/">سياسة الخصوصية</a>
          </div>

          <div className="footer_third">
            <h1>وسائل التواصل الاجتماعي</h1>
            <ul>
              <li>
                <a href="">
                  <i className="fa fa-twitter"></i>
                </a>
              </li>
              <li>
                <a href="">
                  <i className="fa fa-facebook-f"></i>
                </a>
              </li>
              <li>
                <a href="">
                  <i className="fa fa-google"></i>
                </a>
              </li>
              <li>
                <a href="">
                  <i className="fa fa-instagram"></i>
                </a>
              </li>
            </ul>
          </div>

          <div className="footer_third">
            <h1>وسائل اخرى للتواصل</h1>
            <a>KitPress.News@gmail.com</a>
            <a>+2125555555</a>
          </div>
        </div>
      </div>
    );
  }
}

export default Foter;
