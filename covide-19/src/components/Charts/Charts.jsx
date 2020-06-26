import React, { useEffect, useState } from "react";
import { fetchDailyData } from "../../api";
import { Line, Bar } from "react-chartjs-2";
import styles from "./Charts.module.css";
const Charts = ({ data: { confirmed, deaths, recovered }, country }) => {
  const [DailyData, setDailyData] = useState([]);
  useEffect(() => {
    const fetchAPI = async () => {
      setDailyData(await fetchDailyData());
    };
    fetchAPI();
  }, []);

  const linechart =
    DailyData.length != 0 ? (
      <Line
        data={{
          labels: DailyData.map(({ date }) => date),
          datasets: [
            {
              data: DailyData.map(({ confirmed }) => confirmed),
              label: "infecté",
              borderColor: "#3333ff",
              fill: true,
            },
            {
              data: DailyData.map(({ deaths }) => deaths),
              label: "Décès",
              borderColor: "red",
              backgroundColor: "rgba(255,0,0,0.5)",
              fill: true,
            },
          ],
        }}
      />
    ) : null;

  console.log(confirmed, recovered, deaths);

  const barchar = confirmed ? (
    <Bar
      data={{
        labels: ["infecté", "Retours a Domicile", "Décès"],
        datasets: [
          {
            label: "gens",
            backgroundColor: [
              "rgba(0,0,255,0.5)",
              "rgba(0,255,0,0.5)",
              "rgba(255,0,0,0.5)",
            ],
            data: [confirmed.value, recovered.value, deaths.value],
          },
        ],
      }}
      options={{
        legend: { display: false },
        title: { display: true, text: `Total des Cas a ${country}` },
      }}
    />
  ) : null;
  return (
    <div className={styles.container}>{country ? barchar : linechart}</div>
  );
};

export default Charts;
