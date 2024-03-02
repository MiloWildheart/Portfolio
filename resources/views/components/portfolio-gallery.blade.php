<style scoped>
    .PortfolioGallery>body {
        margin: 0;
        width: 100%;
        height: 100vh;
        font-family: 'DM-sans', sans-serif;
    }

    .PortfolioGallery>.container {
        width: 100%;
        max-width: 100%;
        border-radius: 4px;
        margin: 0 auto;
        padding: 40px 0;
        overflow: hidden;
    }

    .PortfolioGallery .content {
        display: flex;
        flex-wrap: wrap;
        margin-top: 20px;
        padding: 0 30px;
        width:
    }

    .wrapper {
        display: flex;
        width: 25%;
        padding: 10px;
    }

    .name {
        position: relative;
        font-size: 16px;
        display: inline-block;
    }

    .box {
        position: relative;
        max-height: 300px;
        border-radius: 4px;
        overflow: hidden;
        box-shadow:
            0 1.4px 1.7px rgba(0, 0, 0, 0.017),
            0 3.3px 4px rgba(0, 0, 0, 0.024),
            0 6.3px 7.5px rgba(0, 0, 0, 0.03),
            0 11.2px 13.4px rgba(0, 0, 0, 0.036),
            0 20.9px 25.1px rgba(0, 0, 0, 0.043),
            0 50px 60px rgba(0, 0, 0, 0.06);

        .hide {
            opacity: 0;
        }

        .frame {
            position: absolute;
            border: 1px solid #fff;
            z-index: 2;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        h2,
        p {
            position: absolute;
            color: #fff;
            z-index: 2;
            width: 100%;
            transition: opacity 0.2s, transform 0.3s;
        }

        h2 {
            font-weight: 500;
            font-size: 22px;
            margin-bottom: 0;
            letter-spacing: 1px;
        }

        p {
            bottom: 0;
            font-size: 14px;
            letter-spacing: 1px;
        }

        &:hover {
            transition: all .3s ease-in-out;
        }

        &:hover:before {
            transition: all .3s ease-in-out;
        }

        img {
            position: relative;
            width: 100%;
            height: 100%;
            z-index: 1;
            transition: all .3s ease-in-out;

            &:hover {
                transition: all .3s ease-in-out;
            }

            &:after {
                content: '';
                position: absolute;
                background-color: rgba(0, 0, 0, .6);
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                opacity: 0;
            }

            &:hover {
                transition: all .3s ease-in-out;
            }
        }
    }

    .vintage {
        h2 {
            top: 50%;
            transform: translate3d(0, 60px, 0);
            text-align: center;
        }

        p {
            opacity: 0;
            bottom: 0;
            transform: translate3d(0, -10px, 0);
            font-size: 14px;
            letter-spacing: 1px;
            text-align: center;
            overflow: hidden;
        }

        &:before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(72, 76, 97, 0) 0%, rgba(72, 76, 97, 0.8) 75%);
            z-index: 2;
            bottom: -100%;
            left: 0;
        }

        &:hover:before {
            bottom: 0;
        }

        &:hover {
            h2 {
                bottom: 40px;
                transform: translate3d(0, 20px, 0);
            }

            p {
                opacity: 1;
                transform: translate3d(0, -30px, 0);
            }
        }
   

  
    @media screen and (max-width: 880px) {
        .wrapper {
            width: 50%;
        }
    

    @media screen and (max-width: 520px) {
        .wrapper {
            width: 100%;
        }
    }
</style>

<div class="PortfolioGallery">
    <div class="PortfolioGallery container">
        <div class="content">
            @forelse($portfolioItems as $portfolioItem)
                <div class="wrapper">
                    <div class="box vintage">
                        <img src="/{{ $portfolioItem->image }}" alt="image">
                        <h2>{{ $portfolioItem->name }}</h2>
                        <p>@foreach ($portfolioItem->tags as $tag)
                            {{ $tag->name }}
                        @endforeach</p>
                    </div>
                </div>

            @empty
                <p>No portfolio items found.</p>
            @endforelse</div>
        </div>
    </div>
