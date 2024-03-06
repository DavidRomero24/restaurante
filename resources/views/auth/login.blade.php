@extends('layouts.applogin')

@section('title','login')

@section('content')
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAUEAAACdCAMAAAAdWzrjAAAB9VBMVEX////uHCUEBAenGyAAAAf/ywftAACiAADSrGcAAAD/zgf/0QcABAf/zwfuGCL/0gfRsGnEHCLZHCTtABLTHCS9HCLJHCLQqF2tHCHuEh3RqWHUHCSmFRvtAAvAHCK0HCH/+PilDhWkAAzgHCT/7e7oHCX+4OHyS1CkABn8y8ztACb6s7X/5uf6ra/BAADQs2qpAAD17eD4lZj909T3hon3jI/1d3rw5NDxOUD7v8HxLzbzVFn//v/1bnL0Y2f2gYTdwZLmtwnp17rmWT/Smpv5oqTjy6T59OxMDRHCmgnZuYGSdAqqhwnch1XVo2Laj1mvMzfcr7Ds0NHJfoDRlpfivb63TVDCbnC4AADOAAC1TjfOpAp1XQrib0lDNQkVEAk/MgnqQTSUEhgzCAv0WiG5VFe4UFPUdnjimpzUSE28aEQhBwp6FBhSQQotIwkgGQhkEBRsVQiHawrgd03esAn+vg77nxbqvEO7mVxTCw/Sm5CxQjnVp4yyRSa5YTbBeke+aVjGPzHWMDa+P0PEem+tMBrHNTrXbG7UV1rclHnQOyDRZDjd4eGMjIzfvaFNTU49Cw7pgBvmcR30pRV8fH09PT6pT1LrTSLvcmHehRjPbBu+QiDovFrRWh9+Z0L1aBH/1UqZfUz/7LJOQCikSDOiYD5ENyP/W8dNAAAgAElEQVR4nO19iV8bd7KnhKRWI0xL0CDRIEFLNAKCwCDMIW4w4BhjARKnbxPjGzu+MpPJxH52JrGT7L43Sfbt7OzMJu/tzObv3Krf0ZdaB1h5cWZSn08cdLW6v11V32/Vr7rlcr0rpqa2NjbzB9vrHmLrnx3sbC5u5bSfe79+EablFg88Cb8/kYhHox5m0Wg8gc95Dja3foWxhKlb+fWEH6DzFDEA0p/Y3sypP/eevpOmbRyAlxUFzwRjwu/Z2fq5d/dds7HffeL3xws9DkKXW8Lkm9G4P76Z+rl3+t2xsd9/anM+QAgg297Jb25s5YhtbSzmd7YxFzIcwRO3f3VEtKHlFwkLfIje+s6iM/FqW4s7Hg531L/+K4ZjK8/jPdYct75Thm6nkos3E/7orxiCLYjPLbwL8G3mpir5pLaxDdqGYLid+6l38521hdbnURN+Ub8/fxQwUpvUEaP+vPpT7eI7bQuRF1FT/MaPwwsb6wTDROKfMJQXQtlPLPjtHC8WtwiGUf+OWt39e9dtaCVy14rf8bXdRgvmw8T6P1U2XI5kPQaAUf/BW2ljNU/dcKNau/fO25jYanZA/9t7T27djxvKV2PvfgE2F8mu95gCuCqukycQHlRjU++6DYmhF1FTAL8lA2hce29hJCe2325rvwRbiIimCI5H30qFaFum4kVbB0KJr6tvu4fvuK1ExAsGgP6Dt2iWahu2LqF64P+Hh/CM2Jr1GA0q/+axt6Ru7GwWor9DIKyoKPxl2lgklG3RAYwnjkvB6sb2TefoRz5JbB9/D99xW4iE1npaWngPYf14EaxtbMcd3I8ZQujfOfYuvtu2TAFs4SlQPcY2tI2b/ptbpcKUQLh4zF18tw0AfIEAUgSP4ycqLqPky1UvO8DI/n/EAg89sKOFI3j06oHAt13S/ahNrcc90bh6jF1kltvY3NzcsJ4DbSOfzy/+rOdlTgcQETwqCZNFvPLux94M0jp+XDbZ2iErWri8pfeKcpvruDgDTyZ+vsp7OSJmm3UEjwYg5j5wv43i7qdaiSV37FS44TGtFsaxXNK2duLGGljU/3PVPAhgRwdDsOUoAIL3gT9E88mi71BzBYsqhE2OzvQ52q01LLEOXx63PaUeebtVMKjkxI4ODmHlOZDkPr//sw216Ftym4sOUK1DHB+5ybCo4xdNsJVp0xJENEFXsxM/h1Qai4ihl80cwUSFh0bgS/hLta61ze1F1ekFEsdHrLixnqGR6t/OL27mrQHt9+Q3NvKJeCHPq8A8+fzGT8kyQwDg82bug/HPKvkMoY543L9e3P3UjfXi65ybfigej1TdHfh5s5J/ZW6bPIWL1weLlMTUg4TJubXcRv4gzpnnp1t0VUUx9KK9gyEYbSmfn3Ad0x+PlnI/devAf1DitE8BgEciE+aB8biZbTf9dEBHNZ7ajnv8UziatwhOigxt7tMd4fuOYiutYra9mfvgYDlvB+bFJUxwP+cABZvK7ZSVNhv+I4nCTQpg4l/O2J7O2xavIT/E8zejfqcJqZ+ovws0LL5s5ggOlvYLCN5BgK+k++Xg5Cc21XLfC2RSOefnCIA9n//e9vxUYcAgSdmwIwN58WPI3IoMWeRuO0ewJItA8A4OxlvA/Vqc+JVYCsWtpwQ367aFZFLhTk6tIyY9F1YqeO9O3IYd7M/O5sbiDjL5MSRUOcMkuNbQzBHsUIu9UVt8s7uLb0r4D4qlZJIfK16WRyessIRYRBfsuRs6U/6tHEE6lre+s7mVVOkLKfjCRPWXuuZaRbG5mSM4WOTgtb47A7sE58GWYo0rpg0rXpZX81Aer1dUyqoIYPRCZIztTXp8YtS2F6m+Sabp18m6KvhdftMWCmoC6KvCvavYMIaft3MEB285vUfrvzMwEG5oaG/e3S3mfirWVhAx5SpjVcvlcpoKiW2HTCXhHFh5lyUu6BFZDGfkmCLJ48bLU8l0tyx00wcpvycBFabjfgB7VTuMIYbFbIPhg2rhW/ru7O01NoXBBtqL4YPcAeLGU7yviqZt7HwSp6Ou6weGGq5AZKBb9WSZC2YEyQ0m9LIXh0cnBFlxx/row80SKkDzV72tBjEcetnQziDcdchKw3udjW1NTU0DA3eK0ANyRyIaLUMf6iKRkBw1C1mWgxDcCmI4FCIPtBgBUEfMJcj4hKSwb/fvlDiN0WojiMXIWridIdj8xuEt6iuAsHFv75bzedUWEb6yU11a3u93mF+PM9VWSlqrW/lt4oKty+TxqEwAdAsZ+npGIA+VUfowWRIhQLC6k90hCOL2Bo7grmN7ZSr9qvNOn2P9pSL14ip6GfpQN+kkJnO/OLsIJe7f2chtLeI4SEIt/JCWW8xvA7pUGX8SokGsdlEXlGT2kRmFAjpc5Mu1ZCY9zZImRHGiqnlwAaVgmCPY4EgjZK8dn9x6nRiMkzZJGfrIefwcPdQX2wcHB+vofXwpGsoNqxPiIPa6hwy083CP3g1FhvC1FHU5dyzN3ksfS+MuJ+udnFCEmCywN2/4o+sld/WoBh4oNjRwBHeP4t+5W8272JCN+qOl6QN7gVEes578FvKwCy8p2zCS7k4CDmxKVTVVnXJNoWObr5Ui1rMmRogY1GIEMZkxr2uJPU5bv1TrG+3uHk12yxK6rMAO7SCeqGpRwlywgTJJcRcssGS+fSBM5U9LuepDPdB7UkVWkOFwQaftrBOWXt+xN1E9mCX8/mwrRdDVDXlQErr513azILac/t4ZIaaAMdJRJtn3VJuK0QXDYe6Elbpg6varPVCH8JH2wc/KSjl1nWXAksPoN/VSNmoqaWlFBg6Z30qpQHsUQa1bECb6+SeHGY/MuFK9PFenJgWAVZFlih9EPHv7YqK6QbwASua8jmDDa8c3QWyp5sfDr/b22prwU+Hd1+XPp7oeZwFcsnzLJ2xeFyXV7EF+I6dpBRcOmPdoljHzhK6oXUsEP2EmfWqCQRhjH1iPVnedGjww1KAjuGtv7KY2Nnc+I1e+rm8DZ7LDyMRA3DQ1hQcGisgb60YYgIm7RQpalf4vz0pZRhxR/2eAnVq+/5rK6MwcE5g+nEavVMaRmnuZg07TV3JVrkgwC641cQTbLVpQ3djxDA4SKoziceEVTIxw1b7pV01Nr25XtCsH9HKSgp4Ut1mmn7ZRUQJPrn8GbpKoYN5aJf8mBZbopIlT/SyIZ5BZFJomZ1mOZNVLPnH0pZlShi74MswQbDeXI1s7g4PxaIu+dszjShf71sAubrQr2vOpqSc13D87OpvO4NnQ+t1ckWBDYiNFtqrmNv9QyvmmhlHeUa86xZSNUeFRACU33ZSb4CspbK/Bt6vZ5x+LQEXcRBEECHdV9ry62DIYbzGZLsmOPA3MuqLPdQCTszKIM0jxgiC44R8WXa58Rf1EtNkJAbfA5HOml2ZByc1fp5jylynA8gh9bcuP7f/qGVbET3QEw0zKqJuDgzp28cTgoH8QvLCFt8yPNAqikjnEnrsh/nhU0NkRjlrSAVTLnZip4b6Min9otKmgy+f+mAUjV59gFtuTLIhZqgAxWM3m4BlwQfEVdlxIGO9S917s0PGLDw5iOtem4LRNTaW28kSnVbpWgws9N5Eeei7QUgLSult2m0wR0qU3QTajQbhrI24hJkyo8HhJtsrncStGGu0x8BKOwqvwh4nqikGQMmK2jSPYMIDP5b4Y5EMLicHtDTtXbOHaYvmFBm1rkxRtdJ3nE9YPAPdQDAcESTxerI6lpmq9/bOTExCPSwrBRViCZ8cli3xOMq7lOoaWyLzlwKoVXQz6q9tdXRFZEBMEMYjVW4NswbhjMOF8bTo2Okucx6nc4s7But9yD4asSF/LCAIkwBjkMEVSZGGir+hWiGkxku+AUydp4LrlJUM+sxLDNSJbMKJ5T3+VqkFJZp6wHk1UUwxiEIde6QgObLm2mhN0oaRjsGOxWMLFlcQi6/F0gMFWzva8iCyQV5NCOom95MzIzPj4TNrJ/5KZ9EiauY8rzSJwekIx0S2Tz3pn0M06hQyjCUvnNalXK3zXqysGSRAbPqjlBxl+iZJnCvfDSREkd+x3YCAl2echkUhpdVItvT9aGnKdDCTtps7PqwlwVyr5pC5dnbgFru6tgpnSiB7SpyjcPKbziejNiqCp0DCIzxsIfnGwyx2wzHXAm36qSrUtKFl2dvKLOC6Q2vGbyzIyArS9s7mlB7xWeqOuNNawEN08Blm4QrocTVI0EQhbL1XvDDKno0mSlyYuiSHPvjpR8bogtyk4xvzr17duO+WtM60op5uaGITtHWypc/ATy7shnff19/dnkkZUoyzVkJgxZONk5nEnb7gfYZD1za1UGcgslhpHP1PkUchrtFnPwlVSEBxERjjlKkCMMq8uBim+kuwyP3TLp+hDEIPRo+yTtvG6fWBgYBfg2d29Uxh2KKfFJo4gG5npaN79nfm4lmbckM7RhIkR/dsX/S0J6zxFPKHDF9/BVkC5vbONYw7LChEdEL+jihsTv8r8RyEqZRK0DBIxUye6fLaJQYovR0yHmwmdnXi8cjGo3qaLkw202mhv2C3o/C1jGmxkCDYwANv/Mma8o68buFOB8oEcniTLPPmrg5ZizwSkv6I79GjpcShI+o0negnZKkTvpWVJUu3hmhzpJ5Av2eSzVQym6Ku82W8Xg+CCldbEudcGfBzDATuEJA0yBBtoCDcPrun9EzUdi2EO755NL42M0+jQW5gHrOaLshv1JPiaRynfm0r1Ls1OJF3qCKlLJIG7ClCmZGiOUzIhgknHpQ/GLtyrhq3tfSq2JYm9mTvoEjsinI8oPmVrxu/OQBNXyQ3h8ADabkO7bRmTpMHLbQRBuljc0fy5Uf73SzFFmJjtVdlDq8zaTGDF4h/choolmUrmFm+CVC15AXdqetwdE+RYtyuj1yU8mTF+ZYw5LmG5kbJXu8Ts8vmUVQxSHpFn2au8dc1Pa8q+FlMEvzcDYd0GBr64tdib03K3GwAmi8IbImqwjSRCttD56Rx/cXhcUITujOkDadl87rcGoWK5aa5YctuONKem+lTyxwgtR+S+U4JelnAJQt1Npo9SgjuWKrb0YUPMxUocJph5EDPtYhODLgydeNmKVL1F/Y/C9zqjH6N6JzxgSVGoBkONZgC/nuOvweHKE7gfWt/oNE05qmA+oJx/0H7Hhakh267gAmM3VB70kcRwGwdK4AJZoq9R/5YUuq+zMoFywlq7MXNbS4yMFSMetezVEZv2Jh3+cnqwb6CNwdc08IqdfWbqQNjSw9eJpIni1643oLTuGM1R6iwuEjK3I4fE9zX1WanmdKq3N+WaJRWZxNylVxd3k33D0wxCVMj6/AFrpqQEkm2HbeFqRYw3dNiGuNNR6mXnRT9pgpH6NvxlEFTf7DVx/N4UFE23B74wPwQiEddwloMmwfa7HMBeWZFkzFDDqG51cUr2lh9RiRbb8ClJAJtmIDGHYMdKG+8ulggpAdD5A57wuhUBMbfXbmaIjPzJeMSt0sdWfDPUI91yvyvFQFxMlI7i3rZGBuDeHYeiMzkQVk0PI4SK29rCDEA+ltcnSArRYH2YsGSu/VGmFV3TNmx4EnkWtbEl1fFjnaDQs/YKSfksWzFfPRWLkU+wMo7PwVDTbOzSx9QKn/Ww6OdUjOdbWc8FO/GS5ertvSaS1ZoGwhmn1zULgmoku5a9DD5I1onb9bG8fkGSFPxCMh2ln17mRQUIqloyqRqPRukSGUhHtvcswGzClxEA8SXqnayMWBJkQvf2cHU5bcXukizv0Q+luni2hbPDPqCWXip+QwFsatpLq5YXVObCqYF2+sJUbuv26y9YX5rG8EujgwdfiA48TCjTWHughGnNS6mlSahYhBhXD8kJPIbYzLCmsTYod7pui/BNmlQcdxySBdNCbHLKARtm3bZeKttMF/2OUZ5qMYIyUmyc+6DCdgI0WLT4lfXqFwzAgZemosKVTM/ojfStgTcukDWvvyClHopsYuiB7byDhwmf5CGVnELZ5ANuM5OgYcAqIPGAHWi2Go7hZ0jxxQOMR5SVF9KmLjNLeKjZ1Bm+asKxmXCZLWmVz3wzdJ+0boPihe4uQUgv8WyrI+73FJ/30JoamQN+aXoy7YZjlLiqf91ExHXYVKcwDBtesBjG3EF3aEa2pyHBnHJg4zOwx7J7aXhJYWHFvJYWANblCVsX1KRUVJqtYLvqkhwT2BvstZvLvBVeYqS5z3UltWRaEGan9biVJGFWL3T0WnQn7jQeZgWw8at/1Z9LTguWFQN1QK9TuIWpKza8DDEexiqTKHiahwRT5UodgO+9K4OlsjCNO9RFFQvdYVYP2JyOQ0b339xl5mRwalYRhG6uO2zhyoz3Uumz04KOV0wB0XVKH11wszYOoAraU5+1xmW6Yi4IALaBLGlr/FqPYG2aOzUXwX2sVCGVHnpjw53Xt/NvBhraG/hoLTaFadyRVK+YaYNqA56YlgTebYKIE4gzTSimj7AAi1HAbWMDo3TPiFKZ5JxtbvpnbGJwyAw8FczJcWHSbZiES1YZjqnCAkHLZIZVvlEVhxaLZMGpV51taI3ndQCXYvqaIq8K3+hSeyD8xevbvax7l/sifCFEsyDJPuTtrIQzUzqtp9jGSADJNCdm+onamqavs4jhq0EWMci2p0qGR7KEB8c80a8fncpclgf92Ir5rMCJ6M1MQ8bUdCfkmbgbU4IkG75sNrxQrFh79c0eAbAty+sqOEGSMG4d+koNEMcLv7l1O2k5E2o427qgg0SyoGZtlRPrNomZJXyd0yw1ev65ejSGqcg3UPEixcxvpSmVE86oWb/O8BFflT5eoTphhqc5RYgpwihvruLHJfrxqRFZENyjVgJnZrlY0WbpvcbGRhDTOoD9gqIovWmrqr+9N9B0i3daLLYVoau5Ku4R8RPmb+Y9YWXxKQMCS9uJgqTXq6MWp7Pysk4yJjGomE/GCPdLxvtDbKGKL5sQn0OOmWY5lKbjkoYDjNFi/eleBLCxsYlLYtRFsUnVxQaaBPrkVNMdR5mNFqFBTIDBwWR6ci1ZkKOGR03rWL2FRIxizrlTlS2zKpwXKOQpc5eZkoNZI1EHNyeRZXZkBoIKDVpUPzFBmCy96IyW8zhcccxNJfg1tmUX2OPJmBtcvGC6vSh+ECU0z6BYIJFLvddaklKvIgtkNJ4t9ZbGlieYC3Kns/CytQtKCY7LaZNqWeLNL712ExmCuliRJ3ieS2UyveVXL1P0YrpiSXCUumB2jj5Uu2U3qRHKTbebbGVO30OMNNrv1Bu9dLPEowmZ0l5UbMn8MtURuli0tpetvMxdiWgSVvybTtaIILM950E/FmFpeligaw3CbCWjQ2dWlnHe9czY8r+QNbCirdVhAmDneTbZMwWKTjbIwK7qTZAMZ0Zm2OmLGJka9V6fpRNIjeoRjCuW8fhEKDH2ZfZqizkdh0xjONDYIDSVtmpkCCBByNhmhX4v8oqztxuEkzJbUZ9+OdLaGgHLPo/HPSVvXfqqEwG8zJMgeKBCQCsy3U4sNQKlHmQQPVPTPcQoRm+gaStmaQDStoLi4oWBdbsUCJ27lyy4WHnZ2rZiF9ZwvZCRZSGjWcWg9jwkivo3qUUhG2td0F8c+p3/87svwO56esgCTiJatKGQwWuNOq/zmmI0xs8dW8Oy4jA1vDQ9mU6N0oa7kakpgimZXHORtK6I0B2nHXqIK40qE8GSfaiX6a13qxi08rLelkmZXoMta6qWgcpW7rUH/eKnITFib38XmDoXEVsjKwsLYwsLc2ufJ8DresCifAFRLfrJ7k60NfYVGH80K/MlAjMO2ghevKfIeoOYbVZsnWNvWJo9lXHkEUoNeG6Yu5nJk5ccHFVnMSip5veSHKku6YWsLHfJuLKQ0meF+NbWPaLY6nBN9hlTA+XMZuLTF2IoFIq0RrJ3PeafD8DZiVJ3ehiOIYCnT1II0D/YnrIiXDBwUEdiZKjC2Gk9U5uixMUFhmxxMuLR5HR0mVfVmFFP0oN41vLdfGyAsQwvLCT3DKQSt7438IQkTE8hxAqusfIKMOnveSGKTBGabAw9bgypYmjhS1zu7/F8cuHChU9Y2EbJnT3I1dmlfx1ltAsR5GUtFlYsQfEVGVXHuiuG+d89Oq33PllGvhUSI6bz6RTEw7oYZFMVFinDLnLjqZGPBjGusWkCXZLAuVTc2rjRThHI0pZrRhifXerVyya8REIsgDD1h2woJBKqiLz4XB/XMe4atb6Bd5fZLPLLH+Z9py4oGsdOGc8+nkNVFu2h8LYJX8jfw2l0Y5vUSWSLWJnRm6sUD2sQs6jlGFnby3xKg2uCScPrlAkN9pl1qPXra6weg7dTiULdLkZWjFw49Ad/vOcTShUXenporOroxY/ygzK9GMRd/IrRWVk/NrsYJJ0ANoFiW8jvGzgf0jOhi1OQpa+UMqSMZU2DGW/+Mbfhco68R2WI6dytF7fuGLlYITUDVYUw7lzL8lsrXBARQ3F5YWxsbGHuBZ1xMlFF1H8TfwiFmIfftqciSyuA4HV2xSiJXHpsfKCJn/glcyFrW8i/0xTOwu5xCFl1YZkUIJqD+CxTwNa+HcVcH1zmi+CA2VRGYoDpy768ZlMEXhWqyeIzXqkEi867WUIUqO+iFqIgNzsiPqemcltbuXIjdjbrhijuuhyiV+uRIBYsbsY7g+Z2qY2lk3vh8Es4xa0izTSUdS0rPIYLsqtbTMtPLn08g2cMfu00hMPMBK/QjDbPFA4zgewbL+J0VgABu/39FuJwngsmosBLC1rgX6SK6DF/rIJYJyK4FoqQB0Qn0BUvPtBET3ySdAI4ZJylGZumse/asHaSBzLlVUsaHDWWmKjSsLS9NNbtU6hP8dY7PqNI8gSLWJM26pudGXWcALbbFI6Nt3xcs89mxPRrWlpa7t+ref/D+/fvF9wE84imKSQNiq3kEUYYPTbbeM44LSdZ1CrWhdgwWWFuehlibDduvQGESydidG7NWl6QV2NcXpIoTgsGUwC99ne5Ld9WqYFEWf4Scpqn5X7NiZoPPeY5O8Dvg5oTYDU1tf/taJstsKSMVCwyOYdHSo/NOi9C57n5BSpM0fLeVC8dcmj6ml08rlnFMRrJm/T9vQUILgkx3nSSpzN93cL4KR1CRRnujaFqiQnWZd9iNibOjQ0BdiuQ8V58SuhiHwAEuD7e9/Dr0/Y/vIfPEav9728DnwvDE1ywUWQ+6BoHUU/czuJmjBp4ATJtZenXdH6w6XyIboSXF8aXkCTKPr5kLWNdyUlBSPPKzK3gvGHKmH6e1HDydKJ7tN+xsYtmqtaG/lWMUK4AieKhdUXL/j0CFvrbB3/8+OOP/3ivxnuC4wcI/ttbI9jV1XUdiJQ+VNOTk3iyrYKMQsarTD59wdfv+Cp9lt0IZ8kyw+LiRRnLmnwxjK4fDkN9LYwa1IHLRcPY4MXSUZAgAqaWei3caLs69gwUs8vgdUMgUbKf+j13795Frujh0o6EcM0Jr9dbQ8L2BI1dw2pr3hLBlAwIQhTbCm/uZiSXJa1FhJ2lGYJhK5GYZjvImgUvybi7SdKp9OgEpDyUJKwLhG9zEyXQe2pmeiTj0MNbEC0QbkBdQbwOJMrneP1OtCdqTneejxFAr/fqo0veGkerrX1LBFUAsEvK6v0z9qylM8hGs3kT2HZDgjtsnf7lSbaNbhuCpJ2qcF2pB6wky1iD09lwJlkUYUYtvb8oO3n9OPR7/2Dcc+Eu+p0FOYpei+f++yTdeQ/rg74HPxWCrm4JEISSImI+txY3YyUcRyxlFYMpHsRfh1rNVKxHMUlq+tSE3hZgLidRxs7EBFmOCZNlFJ76ZSuWsq2hlZWV0NrnCUIMWFbQmfYWnSr273/4R0CPxKvXO183/9AA0OutLoJpDOPrUPGYuz8WNxux9j5t63dLDMG2J7yu4a09lTxKuc19RKM1RV1uVGVPa33ppb5ypVTus0TL3TUof7LZtbstPS12238fFN6HH39w70RNjZHvvOeCBoBezIjeqiKYFDCM1+DUrpwxnjO5GWub6IJ2wtI2mXrFgrjtvA1B+oEkaT6ZL2DlrRRFjs1U1Gynpg7lbvILzlo6evQ7Xnfwf4lEceAK74P5i3oIex+dfTp/troIuiYVTIVZgLB1mWFoEYOMlvlVe1zPMWJQX5FhkaamRgNBCpHUleKrZsYlCy4cyiMBK4wvVXh93xki7yLPd9n1Uvrdrjs6PO/fI3UF+N2JGivHmiAkxv701QUC8+Y4rgKCxAm73OdPYoYhjDxlGfKZtvY+R80sjYCQYQeCIMuD+oSz4BZoX9o6PuXqXUoXl3dgY2PsTA4tgL4j8u75BXpTPhOIHR377/NYtUsUPV7x/1fPXvQxt/Ou1vl8vuC16iIIfkL4+PoTLugsbjZFezT6FSmKlSdAUPOBmxDj4j5jIIoCueQ6ki0DZuLK3EooCwbSuEO/M2nz/gcfQmUBf3mAKmpqnJ2O+pz36rXDB4ih91owUHeOgRnwBXw+9qh6CLpmCYSgaZgTWYY/eYXBCpC+gqm8DJ24aXwSYnqQ31SNsa1b59cF58WeMbOQOnP7wotsllDFS34rOX61Xsd9dLUTNffu0TqtEDr6z7VH51af+nyBet9FpI1Ldb7gIy9zwcA8vHCx2gi60pgK3ddDERUfWWe1R9hFUixpsW5nzFjkGGYIXtZXFHuNSVDZYFvXQsTpBrxQVLSKyxTbM2O/b9/lI7HNNuu4f8/LI9aOHnM7YFzv43lffbCuHlwN43XVSyI3SKjEe63eV3cIEPquequMYEp2E1E4Rx5Zaw6mj/nKK5+/W9J76Thzgwi+PKkXNsMT5CrpmBAbNdh2IWL0YA388rtrdLUCS4sXL8MFwBHwUN6dcAxajh263bwP8DoLma6+DswHfwBpwDOAJnXPs/XgfhcDvuBhtREkftYl2vQcOfgpSytlSo4Cqv0AAA43SURBVF/ViU3o3UEy8dDW2CaaCpvhfrxS39zBu72XFc2KCW3sy4HdhvBLkHgYtZ/Se8dx7wNfBM4F7N6voZ7nmPNqDi+tXnwaCKLb1T0FvOYBr7PnLkEKfBSkCM4HAk8JgIf1vuAV7znAdrXaCCI7SKdDpsUmnXyt93SYNAoKmbenmhqZoaYsepvn9F74FSomqMnIe0CirDzfZQPFbLAY57EbGjwtzfAnYvcByXV27Ly64YOLwTrQJ4FAfV0w6FuF58DxzrLXg5jx8Jl6QsXepwH4A4iFAFtVBIniU9ZajcENQ0GzkHbjClOqW9Cnx/SLXDN7HMHTJ82rTRZT3+xhC/G8GAq1RnC1ItS69hfbQDaBr8HzPqEK5IpiEuUBuN3ZixdXsbRAlwsEffNPz557dO2q94T3QZB7GPpg8JLXe6Wekq/3UR3qGKjxIBEaVXLt1SogSARcF+uP8mVido3fKb66Lc1MysJMH2+i6OvwZOiGWGfWaVkbrTdML5RqaviaBOz5r1+G2ZVTDe0mIJv3/8iQs5UV3Oe8jzHbgdvVBwLBeXyuHvwMVQuxEwS2ukvkwbV5H4S1lwFJwAYXfHAIVEOfYAi+bX/QxRox0uWQVQyylrA+2y4p2HvlbQVd4y3pLtjY2BRyhFBj1/nQCWzjT7T9e9g7bsbLu/fvv19IFjxgrzxevbiK/sNCth6J9jE8X4cOxqQzwnSOEO81QDoQIP0ETsXeS0Gfb34eEqaPhzVF8G171C4WqEo2YqkoeM1haqWQxdk0sGzMWCXTlE4Dwc7TtmVttKFbe6Ry/sgMHAWz4f49luVqa53JAkL20eOzF/G460CZeB+gRJm/uHpuFf4P0cq0HtfQSLyALXk7OOkqwRSeqcdXkWII+gihz0DwbddJXFSvSNdPsvu72paJecPdzS9rSvYvZYweymRXpwVCQhYrC5RQ1DNjy+cpfl89q/N9QxcDmCu273/sLaVPyJ/zgToSseBPdZjTDoPU5byMUUmV9tB7DWH21V9jVBxAMYgk4qXbQCr2PgYCCQZJwkT0r3irF8SEexW7GNRrjklydYASczvdnunUXmdn5w9//uibGxzHJ8ATYoSyRSj7dSO5DXrTt6SY8n337VdfIZxf7X/o0AngrnTt8NLjR8R9aiDwAnUQd+B2jw/hDY/rmJYjf8GbQNz5MK8hzD78MHHSp/N1lJJJL4GSM4YuS5jwIV7YeavhgpR7uRgsuBJIHcXVn+5+1eGjS7HOzm99wfr6+qDvG+aGjaefIFsAXVwON9K+Tdt3JHAIGj7fM1/9ReeIfXgFSJaUFHWko0cU3cVzj65cZW7pXQVFd5Xg8hSgqzGFZjAAJRxUHQHimiSYg4SBrxG40GfBWalXngsGgk8pgrX/4+0BJI0YEIN0nc1+4R7BMFVkpCINAH4TpOCAh33LY5laIylV2tAB630WM9Wlet+JkADTdhiEdZDrSagemt8C3kMYGCsPTHNAxXBafBiaV4jHIRU/9tZQX6x/4OXk/NBnyGjvYQA+QB7U/vvbA0i51y4G8dLGdJn2pzYDAP6pzgAm+J0pJTYyANu+fRb0+YogCBAcPubSzHsR4EBd/PSij9Rj1JPQF3X9PI+ffXTuLJwvolRA/dWvmgX2uTrauyLMW8/OQv0V72owEDBOBD8ptf9ejVtZEu6dsIpBIlhkobvE1Q9qOoZjcxZk6gPf/MmK4Z++8dXZ8TO0BIqTuiBvNWFEzj8mLncFZDIC9JS63FUioQGNh8TZiaMGz1rbLmwbgHmQFSuYeQ/RW+vroA6Zf/rYvtR0ovbfqgEgufAFxCCt6HD407g/Il6optreTv839mUXTot0PgvYsAk8++YGRfGrP3370bN6B/yM/hxJTtwhsQirP0vT3UMf/RM4Yn4VPBIyYxARPMTNYdLzPX3E1V/9Fa/OQli4sYoN8l8As533KbCQ98EDr9cCIObhe/+zCvjxio6PD06Pz0zPjMv63QWkmHTKFMy9k0zHXFe6nACkx1eHbAHxWFf4KrOHTAHTR1fZIdcxaDnleq8GyUmhTLFKXc5Hkh7nBNp2Ic2Za5dWCePqZ2QV3rn60HuVIGvgx8udjwfLLaxWaJj4JH18kG5T6x/X74gjycL4bGY4mRzuG50QGMHgwgDkQF9RiEyIFr4n+NhoucOrrNVkEsePA74gprDDIG1UoZZ5xMsLQy1SrTfvpY2tIFZ5DwL1wVXu08wta2zYnXj/vifcKMn/qyr40X40BLF5ChotY7pbLN4mHO+EoN/3hayQvveNY4SaoIMcF3z23Xd2Jq47yw7/IdS0IE94IwDF8ZVHUI75gizLEdV86ZpRFWNuM2e9GnJCglRz42cezZ89xxdBTliww/GODz7c7wh3SRKOX19fK9pGOqJhz1nRF4lMNiuYe/WsNFbpaxPu9248Kwog7TQ9++7P//svuBru+c4MYcD31x9redaHiNNbTQSeeqxAfHXzlwhgq/W6hmMu5ws8NSP4IKh/HfjpI2+NyT+tIXt/v7kRoSOz69dPP8merBaArusSQVAsbMBnFMWGIC9UhoX3vgs6RTBJ8s+effTn//NVc0dPD787Hk2XWD385jd/Fb9nAGLX6ZBI4gdEI+Nf9didp8VEDaMFPSbhv4C5JUDUn9HYKoQOe4sffHw/Gu5yU7+TugC78zgLHKno9+oqsTPBH96jVGwPYxfe+UK2uSBbK5lWumz4YcjWo9tB2cZ+54Wv6no8PX+uB+z+GmnFH+HgAKLPYemK8oP0nryI8NlVIgqfehmmRNMQewCK+bDOuszmffRYb2wVMAWGbGOnRLFzd12/DKWSeBJKTREq9+WCgz2u/Ufgm/ewN4hXWxRC6Bq1RDLvaKUEUw4MkMB79tE3P/yJ34aQQsgXxsnv+ojc/vMBB/CQ9juBdolfkdYoNg0wHdbRZ3xELl+7dO7sU6QWUMkBi/qzB63OFPsNjW6GnXT99OXz2exJip2IlxqKy1WLYNf/Bd2BCEqnT2JbamFsbHlubtnUneozDeTqbf1R5b1nBlN89O0NJOZO2kMIGz/0ojshQfC3v/3P7/92tba2lh88bbmjCiTswMUxjWYIb0rF86xTFQDhDYWFaX7DbMzvCFNwtyPpbi0bMkEXaV1ZXhirHnxQEiOT3UAIldPo4CcjkZMh+CrTclCqm7uh/tOCSeG9HwhTgNu53wPrYggaENoQ/PvfHtYSM81PQdVVf+nx6kWC1xVGvKQeQ9lM+1FEP9MlkPn5K7iYadPFfBS65n0bU1w+v0a7Qxy7lbnlsaFqYkdtDvfwGc1x7uuXT3e63def4FUNZmbuG6fzpPp9CLoV9w833AQ7im0hgg2WMI7+vbbG5jmMN0hPitYoRBzXUJlcR9rw4HKMZM8dUkb2WrUdZ4qGQqYwhezK3MJY2cs6j2lnIkSefUSBkOgVCYr7SUi0Luz2pqdnRvSFS2PclFuXGcJwoRNG/14QdtjvxDxAWu6kjKDimKLrw24ZIHh29dGVhzaisDBFW6ebRayFKQh0rWK1Q7bQFiI+BuF7ZkAgovHimiLfPSzYAXRyQguCLQUIknouAMx76fAq6Grswl81NRweYw1y1U6yjClOUKbo4kwxQZhCT3eY7UR0u58WO2rLEVYkPLtBIpKHpdS1FnLmZpfp/iyVIYgQRv9frR3Bc0Gqlb20fQAUci1YF9QbeM7CuPbeh/stJZki8tO7nSOCvkDw2Uc/3Ljx7Uff3aAYKk9Oig4jGkAskl1lVxLGv7UhiNWY0e88GwwCdoeQ7ezZ0soUbZwpJAemCP00TFEpgj42aQKa4SP3e6ZItmfg3oIypYIw7sl+b0eQrg+xB4dQ+l51CFiDKTptTCH+VzFFOTMjqCPpu0EjeYJE8pz5tGoOpXJJNm7GgclPsqGrNgAfBIyIdZLFxZki9F/LFOXMCUFf3Xecmi+LZOVyTKXvHkrLsjN+DmFMMXx59wXk+NDf7C547uLqpasOyvidY4pytiw69Ab+4zqHRXI/AXUgkkCZWzkvO3FIgRPiDFdTU/sFwI4mqtBvf7TzSEEHxWCK+1FHpgj9TExRzpbF39gbLIH5rPm6Suk0nH6xNbt22e2cAM1OiCC2vYQcn6XQQSH3/fc/GnWckzHo0O2amySz262JJ21MsfBOuJ3FFlrFeR1C1nsKnbdAJdGbEykl3I9occzxeNQsUWEN/LDGVsg5YUeYor2TtQHeOaYoZ3iLk98Q+Izekw3B0kbkBT1qnqgM7AqliQEdawO0NL3jTFHWVhC1SIRABzsN+7wiVoYgQifxSopgh9D9eLW2FHacKf54f7+9DFP8HOLuOHZmJdLayloXlN3GImUQpIdNEhXtuVHsCnovjunOiSnEd5kpKrCxZWuGLoEgOe4uxo/U7QC7Hyl0ZZniQ2AKdwmmEN9JpjiGOSKIh+2+fl1nitDbMMXlXxJTHMPGIlY1YzAFpLuTJxlTeGm2c76iyMQUcTNTnP4lMsXRbSESOq0YTHHa1HMTn5y+3nl0pnB3Wpmi9RfFFEe3oYgYuuyWujhTkLWFFapzJgCSuHPG4y0UC1NINqZo/UUyxZENBA7wxEly6wKytuCiP4SDP2+K0w33a084QGcwhaIzhWV57B+HKcoaCBzM7hZXoQiKIkmN+9brUS1MoTgzxfI/ElNUYGcKXGUsYipXpMb794j7AVNEm3jn7p+HKY5lZyiC4skn7J5jjeEwMgU2jCU3zZl2pvgnCdlKbYUNHJxc66KdBs4UlwuYYu5Xt3OyIeaEEKTnT3e53ROnMWT/SZnieLbMIRSpNPwHril+KpvTIeSNnF+Z4oi20EobiDp2v4bskW1hDgD81e3M9v8BPIZ5e6TuMDAAAAAASUVORK5CYII=" alt="">
        
        </div>
        <div class="card-body">
            <p class="login-box-msg"><b>Iniciar Sesión</b></p>
            <form action="{{route('login')}}" method="post">
            @csrf

            <div class="input-group mb-3">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="usuario@example.com" >
                
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="current-password">
          
                <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <button type="submit" class="btn btn-danger btn-block ">Ingresar</button>
                
            </div>
            <div class="col-6">
                <a href="{{ route('register') }}" class="btn btn-danger btn-block bg-red">Registro</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="mb-1 mt-2">
                    @if (Route::has('password.request'))
                    <a class=" text-red" href="{{ route('password.request') }}">Olvidé mi contraseña</a>
                    @endif
                </p>
            </div>
        </div>
      </form>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

@endsection



