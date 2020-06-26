import React, { Component } from "react";
export class Header extends Component {
  render() {
    return (
      <div>
        <div className="logo">logo</div>
        <div className="menu-toggle"></div>
        <nav>
          <ul>
            <li>
              <iframe
                src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=fr&size=small&timezone=Africa%2FCasablanca"
                width="100%"
                height="90"
                frameborder="0"
                seamless
              ></iframe>
            </li>
            <li>
              <a href="/">الصفحة الرئيسية</a>
            </li>
            <li>
              <a href="/">الاخبار</a>
            </li>
            <li>
              <a href="/">تصنيفات الاخبار</a>
            </li>
            <li>
              <a href="/">عن الموقع</a>
            </li>
            <li>
              <a href="/">اتصل بنا</a>
            </li>

            <li>
              <a href="/">تسجيل الدخول</a>
            </li>
          </ul>
        </nav>
        <div className="clearfix"></div>
      </div>
    );
  }
}

export default Header;
