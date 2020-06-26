import React from "react";

import { Cards, Charts, CountryPicker } from "./components";
import styles from "./App.module.css";
import { fetchData } from "./api";
import covidimage from "./images/image.png";
class App extends React.Component {
  state = {
    data: {},
    country: "",
  };

  async componentDidMount() {
    const fetchedData = await fetchData();
    this.setState({ data: fetchedData });
  }
  hundelCountryChange = async (country) => {
    const fetchedData = await fetchData(country);
    this.setState({ data: fetchedData, country: country });
  };
  render() {
    const { data, country } = this.state;
    return (
      <div className={styles.container}>
        <img className={styles.image} src={covidimage} />
        <Cards data={data} />
        <CountryPicker hundelCountryChange={this.hundelCountryChange} />
        <Charts data={data} country={country} />
      </div>
    );
  }
}
export default App;
