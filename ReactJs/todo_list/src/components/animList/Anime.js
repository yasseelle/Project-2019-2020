import React, { Component } from "react";
export class Anime extends Component {
  constructor(props) {
    super(props);

    this.state = {
      animes: [
        {
          id: 1,
          title: "Cowboy Bebop",
          desc:
            'In the year 2071, humanity has colonized several of the planets and moons of the solar system leaving the now uninhabitable surface of planet Earth behind. The Inter Solar System Police attempts to keep peace in the galaxy, aided in part by outlaw bounty hunters, referred to as "Cowboys". The ragtag team aboard the spaceship Bebop are two such individuals.',
        },
        {
          id: 1000,
          title: "Uchuu Kaizoku Captain Harlock",
          desc:
            "The year is 2977. Mankind has become complacent and stagnant. All work is done by machines, while humans spend all their time on entertainment. But when a mysterious invader from the stars catches Earth unawares, only the legendary space pirate Captain Harlock and the crew of the Arcadia have the will to stand against them. ",
        },
      ],
    };
  }

  render() {
    return (
      <div className="container">
        <div className="row mt-5">
          {this.state.animes.map((anim) => (
            <div className="col-md-6 ">
              <div className="card">
                <div className="card-img-top">{anim.id}</div>
                <div className="card-body">
                  <h4 className="card-title">{anim.title}</h4>
                  <p className="card-text">{anim.desc}</p>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    );
  }
}

export default Anime;
